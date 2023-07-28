@include('provider.header')
<div class="container">
    <!-- Modal Create-->
    <div class="modal fade" id="add_provider" tabindex="-1" aria-labelledby="add_providerLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_providerLabel">Create Provider</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{!! route('store.provider') !!}" method="POST">
                        @csrf
                        <div class="container">
                            <div class="mb-3">
                                <label for="provider_name" class="form-label">Name of Provider</label>
                                <input type="text" name="provider_name" class="form-control"
                                    id="provider_name">
                            </div>
                            <div class="mb-3">
                                <label for="url" class="form-label">Url</label>
                                <input type="text" name="url" class="form-control" id="url">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container text-center mb-5 mt-0">
        <div class="row">
            <div class="col-md-12">
                <h1>Ricky Morales' Technical Exam</h1>
            </div>
        </div>
    </div>
    <!--include messages -->
    @include('message.alert')

    <div class="wrapper">
        <div class="box d-flex justify-content-center image"></div>
    </div>   

    <div class="d-flex justify-content-center">
        <div id="loading" class="" style="display:none;">
            <div class="lds-facebook">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end mb-3">
        <button type="button" class="btn btn-primary btn-sm btn-add" data-bs-toggle="modal"
            data-bs-target="#add_provider">Add</button>
    </div>
    <div class="table-responsive">
        <table id="tbl_provider" class="table nowrap table-striped table-bordered" style="width:100%;">
            <thead>
                <tr>
                    <th style="width: 25%; text-align:center;">Name of Provider</th>
                    <th style="width: 40%; text-align:center;">URL</th>
                    <th style="width: 25%; text-align:center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($providers) > 0)
                    @foreach ($providers as $provider)
                        <tr>
                            <td>{{ $provider->provider_name }}</td>
                            <td>{{ $provider->url }}</td>
                            <td style="text-align:center;"> <a data-bs-toggle="modal" data-bs-target="#update_{{ $provider->id }}" href="#update">Edit</i></a> / 
                                <a data-bs-toggle="modal" data-bs-target="#destroy_{{ $provider->id }}" href="#update">Delete</i></a> / 
                                <button class="btn btn-primary btn-sm btn-show" id="show_{{ $provider->id }}">Show Image</button>
                            </td>

                            <!-- Modal Update -->
                            <div class="modal fade" id="update_{{ $provider->id }}" tabindex="-1"
                                aria-labelledby="update_providerLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="update_providerLabel">Update Provider</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{!! route('update.provider', $provider->id) !!}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="container">
                                                    <div class="mb-3">
                                                        <label for="provider_name" class="form-label">Name of
                                                            Provider</label>
                                                        <input type="text" name="provider_name"
                                                            value="{{ $provider->provider_name }}" class="form-control"
                                                            id="provider_name">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="url" class="form-label">Url</label>
                                                        <input type="text" name="url"
                                                            value="{{ $provider->url }}" class="form-control"
                                                            id="url">
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Delete -->
                            <div class="modal fade" id="destroy_{{ $provider->id }}" tabindex="-1"
                                aria-labelledby="destroy_providerLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <form action="{!! route('destroy.provider', $provider->id) !!}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="container">
                                                    <span style="color:red; font-weight: bold; font-size: 18px;">Are you sure you want to delete this provider?</span>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Confirm</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </tr>
                        @include('provider.script')
                    @endforeach
                @else
                    <td colspan="3" style="text-align:center;">No data</td>
                @endif
            </tbody>
        </table>
    </div>
</div>

