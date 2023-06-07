@extends('admin.layouts.app')
@section('panel')

    <div class="content-wrapper">
    <div class="row" style="padding: 20px">


        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table id="myTable" class="display table table--light tabstyle--two" >
                            <thead>
                            <tr>
                                <th scope="col">@lang('id')</th>

                                <th scope="col">@lang('Name')</th>

                                <th scope="col">@lang('Actions')</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($Specialties as $item)
                                <tr>
                                    <td data-label="@lang('ID')"><strong>{{ __($item->id) }}</strong></td>

                                    <td data-label="@lang('Name')"><strong>{{ __($item->name) }}</strong></td>





                                    <td data-label="Action">
                                        <form action="{{ route('admin.specialties.edit', $item->id) }}" style="padding: 20px">
                                            <button  type="submit" class="btn btn-primary float-right">Edit</button>
                                        </form>
                                        <form action="{{ route('admin.specialties.remove', $item->id) }}" style="padding: 20px">
                                            <button  type="submit" class="btn btn-danger float-right">Delete</button>
                                        </form>


                                    </td>



                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($empty_message) }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                            <tfoot>
                            <tr>
                                <th scope="col">@lang('id')</th>

                                <th scope="col">@lang('Name')</th>

                                    <th scope="col">@lang('Actions')</th>

                            </tr>
                            </tfoot>
                        </table><!-- table end -->

                    </div>
                </div>

            </div><!-- card end -->
        </div>
    </div>



    {{-- Status MODAL --}}
    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">@lang('Update Status')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form method="post" action="">
                    @csrf

                    <div class="modal-body">
                        <p class="text-muted">@lang('Are you sure to change status?')</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('No')</button>
                        <button type="submit" class="btn btn--danger deleteButton">@lang('Yes')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection


@push('breadcrumb-plugins')
    <form action="{{ route('admin.specialties.add') }}" style="padding: 20px">
        <button  type="submit" class="btn btn-primary float-right"><i class="fas fa-plus"></i>Add New</button>
    </form>
@endpush


