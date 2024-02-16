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



class EmailTemplateDataTable extends DataTable
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
        
        ->editColumn('subject', function($record) { 
            return $record['subject']?? __('global.N/A');
        }) 

        ->addColumn('status', function ($record) {
            $checkedStatus = ($record['status'] == '1' ? 'checked' : '');
            $currentStatus = ($record['status'] == '1' ? 'Active' : 'In-active');
            $status = 1;
            if ($record['status'] == '1') {
                $status = '0';
            }

            // $html = ' <div class="form-group custom-control custom-switch custom-switch-off-danger custom-switch-on-success"><input class="emailTemp_status custom-control-input" id="normal' . $record['id'] . '"  value="' . $status . '" ' . $checkedStatus . ' type="checkbox" name="status" data-status-id="' . $record['id'] . '"> <label class="custom-control-label" for="normal' . $record['id'] . '">'.$currentStatus.'</label></div>';

            $html = '<div class="form-check form-switch table-switch">
            <input class="form-check-input emailTemp_status" id="normal' . $record['id'] . '"  value="' . $status . '" ' . $checkedStatus . ' type="checkbox" name="status" data-status-id="' . $record['id'] . '">
            <label class="form-check-label" for="normal' . $record['id'] . '">'.$currentStatus.'</label>
          </div>';
            

            return $html;
        })        
       
        ->addColumn('action', function($record) {
            $action  = '<div class="action-grid d-flex gap-2">';
            $action .= '<a class="action-btn bg-dark" title="'.__('global.edit').'" href="'.route("admin.email-templates.edit", $record['id']).'">
                <i class="fi fi-rr-edit"></i>
            </a>';
        
            // $action .= '<form action="'.route('admin.upload-options.destroy', $record['id']).'" method="POST" class="deleteUploadOptionForm">
            //             <input type="hidden" name="_method" value="DELETE"> 
            //             <input type="hidden" name="_token" value="'.csrf_token().'">
            //             <button class="action-btn bg-dark" title="'.__('global.delete').'"><i class="fi fi-rr-trash"></i></button></form>';
            $action .= '</div>';
            return $action;
        })            
        ->rawColumns(['action','status']);

    }



    /**

     * Get query source of dataTable.

     *

     * @param \App\Models\EmailTemplate $model

     * @return \Illuminate\Database\Eloquent\Builder

     */

    public function query()
    {
        $emailTemplateApiData = $this->getRequest('email-templates')['data'];  
        //dd($emailTemplateApiData);
        return $emailTemplateApiData;

    }



    /**

     * Optional method if you want to use html builder.

     *

     * @return \Yajra\DataTables\Html\Builder

     */

    public function html(): HtmlBuilder
    {
        return $this->builder()
        ->setTableId('emailtemplate-table')
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



    /**

     * Get columns.

     *

     * @return array

     */

    protected function getColumns()

    {

        return [
            Column::make('DT_RowIndex')->title('#')->orderable(false)->searchable(false),
            Column::make('title')->title(__('cruds.email-templates.fields.title')),
            Column::make('subject')->title(__('cruds.email-templates.fields.subject')),
            Column::computed('status')->title(__('cruds.email-templates.fields.status'))->orderable(false)->searchable(false),
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

        return 'EmailTemplate_' . date('YmdHis');

    }

}

