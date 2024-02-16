<?php

namespace App\DataTables;

use App\Models\Customer;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;
use App\Traits\HttpRequestTrait;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Support\Str;

class CustomerDataTable extends DataTable
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
            ->editColumn('gender', function($record) {
                return Str::ucfirst($record['gender']) ?? __('global.N/A');
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
                // return '<span class="ac-status active">' . ($record['verification_status'] == 1 ? __('global.completed') : __('global.not_verified')) . '</span>';
                return '<span class="ac-status ' . $record['status'] . '">' . ucfirst($record['status']) . '</span>';
            }) 
            ->addColumn('action', function($record) {
                $action  = '<div class="action-grid d-flex gap-2">';
                
                $action .= '<a class="action-btn bg-dark" title="'.__('global.view').'" href="'.route('admin.customers.show', $record['id']).'">
                                <i class="fi fi-rr-eye"></i>
                            </a>';
            
                $action .= '<a class="action-btn bg-dark" title="'.__('global.edit').'" href="'.route("admin.customers.edit", $record['id']).'">
                    <i class="fi fi-rr-edit"></i>
                </a>';
            
                $action .= '<form action="'.route('admin.customers.destroy', $record['id']).'" method="POST" class="deleteCustomerForm">
                            <input type="hidden" name="_method" value="DELETE"> 
                            <input type="hidden" name="_token" value="'.csrf_token().'">
                            <button class="action-btn bg-dark" title="'.__('global.delete').'"><i class="fi fi-rr-trash"></i></button></form>';
                $action .= '</div>';
                return $action;
            })
            ->addColumn('photo_upload_option', function($record) {
                $photoUploadOption = __('global.N/A');
                if(count($record['media']) > 0){
                    $data = collect($record['media']);
                    $filteredPhotoUploadOption  = $data->where('upload_type', 'photo_id_image')->toArray();
                    if(count($filteredPhotoUploadOption) > 0){
                        $filteredPhotoUploadOptionKeys = array_keys($filteredPhotoUploadOption);
                        $filteredPhotoUploadOptionFirstKey = $filteredPhotoUploadOptionKeys[0];
                        if(!empty($filteredPhotoUploadOption[$filteredPhotoUploadOptionFirstKey]['upload_option'])){
                            $photoUploadOption = $filteredPhotoUploadOption[$filteredPhotoUploadOptionFirstKey]['upload_option']['title'];
                        }
                    }
                   
                }
                return $photoUploadOption;
                
            })
            ->addColumn('photo_id_image', function($record) {
                $photoIdImagePath = __('global.N/A');
                if(count($record['media']) > 0){
                    $dataPhotoIdImagePath = collect($record['media']);
                    $filteredPhotoIdImagePath  = $dataPhotoIdImagePath->where('upload_type', 'photo_id_image')->toArray();
                    if(count($filteredPhotoIdImagePath) > 0){
                        $filteredPhotoIdImagePathKeys = array_keys($filteredPhotoIdImagePath);
                        $filteredPhotoIdImagePathFirstKey = $filteredPhotoIdImagePathKeys[0];
                        $photoIdImagePath =$filteredPhotoIdImagePath[$filteredPhotoIdImagePathFirstKey]['path'];
                    }
                      
                }
                return $photoIdImagePath;
                
            })
            ->addColumn('address_upload_option', function($record) {
                $addressUploadOption = __('global.N/A');
                if(count($record['media']) > 0){
                    $dataAddressUploadOption = collect($record['media']);
                    $filteredAddressUploadOption  = $dataAddressUploadOption->where('upload_type', 'address_proof_image')->toArray();
                    if(count($filteredAddressUploadOption) > 0){
                        $filteredAddressUploadOptionKeys = array_keys($filteredAddressUploadOption);
                        $filteredAddressUploadOptionFirstKey = $filteredAddressUploadOptionKeys[0];
                        if(!empty($filteredAddressUploadOption[$filteredAddressUploadOptionFirstKey]['upload_option'])){
                            $addressUploadOption = $filteredAddressUploadOption[$filteredAddressUploadOptionFirstKey]['upload_option']['title'];
                        }
                    }
                   
                }
                return $addressUploadOption;
                
            })
            ->addColumn('address_proof_image', function($record) {
                $addressProofImagePath = __('global.N/A');
                if(count($record['media']) > 0){
                    $dataAddressProofImagePath = collect($record['media']);
                    $filteredAddressProofImagePath = $dataAddressProofImagePath->where('upload_type', 'address_proof_image')->toArray();  
                    if(count($filteredAddressProofImagePath) > 0){  
                        $filteredAddressProofImagePathKeys = array_keys($filteredAddressProofImagePath);
                        $filteredAddressProofImagePathFirstKey = $filteredAddressProofImagePathKeys[0];
                        $addressProofImagePath = $filteredAddressProofImagePath[$filteredAddressProofImagePathFirstKey]['path'];
                    }
                       
                }
                return $addressProofImagePath;
                
            })      
            ->addColumn('liveliness_image', function($record) {
                $livenessImagePath = __('global.N/A');
                if(count($record['media']) > 0){
                    $dataLivenessImagePath = collect($record['media']);
                    $filteredLivenessImagePath = $dataLivenessImagePath->where('upload_type', 'liveliness_image')->toArray(); 
                    if(count($filteredLivenessImagePath) > 0){
                        $filteredLivenessImagePathKeys = array_keys($filteredLivenessImagePath);
                        $filteredLivenessImagePathFirstKey = $filteredLivenessImagePathKeys[0];
                        $livenessImagePath = $filteredLivenessImagePath[$filteredLivenessImagePathFirstKey]['path'];
                    }
                    
                }
                return $livenessImagePath;
                
            })           
            ->rawColumns(['action','email','mobile_number','status','fullAddress','photo_id_image','address_proof_image','liveliness_image', 'photo_upload_option','address_upload_option']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Customer $model
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
        // $data = collect($apiData[0]['media']);
        // dd($data);
       //print_r($apiData);die;
        return $apiData;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
        ->setTableId('customer-table')
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->dom('lBfrtip')
        ->buttons(
            Button::make('export'),
            // Button::make('reset'),
            // Button::make('reload')
        )
        ->parameters([
            'stateSave' => false,
            //'buttons' => ['export', 'print', 'reset', 'reload'],
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
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('#')->orderable(false)->searchable(false),
            Column::make('fullName')->title(__('global.name')),
            Column::make('brand_title')->title(__('cruds.brand.title_singular').' '. __('global.name')),
            Column::make('dob')->title(__('cruds.customer.fields.dob')),
            Column::make('gender')->title(__('cruds.customer.fields.gender')),
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

            Column::computed('photo_upload_option')
            ->visible(false)
            ->exportable(true)
            ->printable(false)
            ->title('Photo Upload Option'),

            
            Column::computed('photo_id_image')
            ->visible(false)
            ->exportable(true)
            ->printable(false)
            ->title('Photo Id Image'),

            Column::computed('address_upload_option')
            ->visible(false)
            ->exportable(true)
            ->printable(false)
            ->title('Address Upload Option'),

            Column::computed('address_proof_image')
            ->visible(false)
            ->exportable(true)
            ->printable(false)
            ->title('Address Proof Image'),
            Column::computed('liveliness_image')
            ->visible(false)
            ->exportable(true)
            ->printable(false)
            ->title('Liveness Image'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Customer_' . date('YmdHis');
    }
}
