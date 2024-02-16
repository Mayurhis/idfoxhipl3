<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Illuminate\Http\Request;
use App\Traits\HttpRequestTrait;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class DashboardDataTable extends DataTable
{

    use HttpRequestTrait;
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */

    public function dataTable($query)
    {
        return datatables()
            ->collection($query)
            ->addIndexColumn()
            ->editColumn('fullName', function($record) { 
                return $record['fullName'];
            })
            ->editColumn('brand_title', function($record) {
                return $record['brand']['title'] ?? __('global.N/A');
            })
            ->editColumn('dob', function($record) { 
                return date("d F, Y", strtotime($record['dob']));
            }) 
            ->editColumn('fullAddress', function($record) {
                return $record['address'] ? $record['address'][0]['fullAddress'] : __('global.N/A');
            }) 
            // ->editColumn('city', function($record) {
            //     return $record['address'] ? $record['address'][0]['city'] : __('global.N/A');
            // }) 
            ->editColumn('email', function($record) {
                return '<a href = "mailto: '.$record['email'].'" title="'.$record['email'].'">'.$record['email'].'</a>';
            }) 
            ->editColumn('mobile_number', function($record) {
                return $record['mobile_number'] ? '<a href="tel:'.$record['mobile_number'].'" title="'.$record['mobile_number'].'">'.$record['mobile_number'].'</a>' : __('global.N/A');
            })  
            ->editColumn('status', function($record) {
                return '<span class="ac-status ' . $record['status'] . '">' . ucfirst($record['status']) . '</span>';
            }) 
            ->addColumn('action', function($record) {
                $action  = '<div class="action-grid d-flex gap-2"><a class="action-btn bg-dark" title="'.__('global.view').'" href="'.route('admin.customers.show', $record['id']).'">
                                <i class="fi fi-rr-eye"></i>
                            </a></div>';
                return $action;
            })            
            ->rawColumns(['action','email','mobile_number','status','fullAddress']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DashboardDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    { 
        $brandValue = $this->request()->input('brand');
        $url = 'customers';
        if($brandValue){ 
            $url = 'customers?brand='.$brandValue;
        }
        $apiData = $this->getRequest($url)["customers"];     
        return $apiData;
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
        ->setTableId('dashboard-table')
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->dom('Blfrtip')
        ->buttons(
            Button::make('export'),
            Button::make('reset'),
            Button::make('reload')
        )
        ->parameters([
            'stateSave' => false,
            'buttons' => ['pageLength'],
            'responsive' => true,
            'autoWidth' => true,
            'width' => '100%',
            'searchDelay' => 1000,
            "lengthMenu"=> [[ 10, 25, 50, 100, -1 ], [ 10, 25, 50, 100, "All" ]],
            "pageLength"=> 10,
            "processing"=> true,
            "serverSide"=> true,
        ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('#')->orderable(false)->searchable(false),
            Column::make('fullName')->title(__('global.name')),
            Column::make('brand_title')->title(__('cruds.brand.title_singular').' '. __('global.name')),
            Column::make('dob')->title(__('cruds.customer.fields.dob')),
            Column::make('fullAddress')->title(__('cruds.customer.fields.address')),
            // Column::make('city')->title(__('cruds.customer.fields.city')),
            Column::make('email')->title(__('cruds.customer.fields.email')),
            Column::make('mobile_number')->title(__('cruds.customer.fields.mobile_number')),
            Column::make('status')->title(__('cruds.customer.fields.kyc_status')),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->addClass('datatable_action')
            ->title(__('global.action')),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Dashboard_' . date('YmdHis');
    }
}
