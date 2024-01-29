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

class UploadOptionDataTable extends DataTable
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
            ->editColumn('image', function($record) {
                $image = __('global.N/A');
                if($record['image']){
                    $image = '<div class="step2pimg" id="CustomersPic" name="CustomersPic">
                                <img src="'.$record['image'].'" alt="image">
                            </div>';
                }
                return $image;
            }) 
            ->editColumn('country_id', function($record) { 
                return $record['country']['name'] ?? __('global.N/A');
            }) 
            ->editColumn('is_default_document', function($record) { 
                return $record['is_default_document'] == 1 ? __('global.yes') : __('global.no');
            }) 
            ->editColumn('upload_type', function($record) { 
                return ($record['upload_type'] && config('admin')['upload_option_type'][$record['upload_type']]) ? config('admin')['upload_option_type'][$record['upload_type']] : __('global.N/A');
            })  
            ->addColumn('action', function($record) {
                $action  = '<div class="action-grid d-flex gap-2">';
                
                // $action .= '<a class="action-btn bg-dark" title="'.__('global.view').'" href="'.route('admin.upload-options.show', $record['id']).'">
                //                 <i class="fi fi-rr-eye"></i>
                //             </a>';
            
                $action .= '<a class="action-btn bg-dark" title="'.__('global.edit').'" href="'.route("admin.upload-options.edit", $record['id']).'">
                    <i class="fi fi-rr-edit"></i>
                </a>';
            
                $action .= '<form action="'.route('admin.upload-options.destroy', $record['id']).'" method="POST" class="deleteUploadOptionForm">
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
        $apiData = $this->getRequest('upload-options')["data"];  
        return $apiData;
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
        ->setTableId('upload-options-table')
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
        ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('#')->orderable(false)->searchable(false),
            Column::make('image')->title(__('global.image')),
            Column::make('title')->title(__('cruds.upload-options.fields.title')),
            Column::make('country_id')->title(__('global.country')),
            Column::make('upload_type')->title(__('cruds.upload-options.fields.upload_type')),
            Column::make('is_default_document')->title(__('cruds.upload-options.fields.default_document')),
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
        return 'UploadOption_' . date('YmdHis');
    }
}
