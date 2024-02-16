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

class KycCOnfigurationDataTable extends DataTable
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
            ->editColumn('created_at', function($record) { 
                return date("d F Y", strtotime($record['created_at']));
            })
            ->editColumn('title', function($record) {
                return $record['title'] ?? __('global.N/A');
            }) 
            
            ->editColumn('country_id', function($record) { 
                return $record['country']['name'] ?? __('global.N/A');
            }) 
            ->editColumn('status', function($record) { 
                $statusData = config('admin')['kyc_configuration_status'];
                foreach($statusData as $key => $value){
                    if($record['status'] == $key){
                        return $value;
                    }
                }
                
            })  
             ->editColumn('configuration', function($record) { 
                return $record['configuration'] ? ucwords(str_replace(['_', ','], [' ', ', '], $record['configuration'])) : __('global.N/A');
            }) 
            ->addColumn('action', function($record) {
                $action  = '<div class="action-grid d-flex gap-2">';
                
                $action .= '<a class="action-btn bg-dark" title="'.__('global.edit').'" href="'.route("admin.kyc-configurations.edit", $record['id']).'">
                    <i class="fi fi-rr-edit"></i>
                </a>';
            
                $action .= '<form action="'.route('admin.kyc-configurations.destroy', $record['id']).'" method="POST" class="deleteKycConfigurationForm">
                            <input type="hidden" name="_method" value="DELETE"> 
                            <input type="hidden" name="_token" value="'.csrf_token().'">
                            <button class="action-btn bg-dark" title="'.__('global.delete').'"><i class="fi fi-rr-trash"></i></button></form>';
                $action .= '</div>';
                return $action;
            })            
            ->rawColumns(['action','image']);
    }

    public function query()
    {   
        $data = [];
        $apiData = $this->getRequest('kyc-configurations');
        if($apiData['status'] == false){
            return $data;
        }else{
            return $apiData["data"];
        }  
        

    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
        ->setTableId('kyc-configurations-table')
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
            Column::make('country_id')->title(__('global.country')),
            Column::make('status')->title(__('cruds.kyc-configurations.fields.status')),
            Column::make('configuration')->title(__('cruds.kyc-configurations.fields.configuration')),
            Column::make('created_at')->title(__('global.created_at'))->searchable(false),
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
        return 'KycConfiguration_' . date('YmdHis');
    }
}
