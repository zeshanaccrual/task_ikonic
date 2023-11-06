@extends('app.layouts.main-layout')

@section('page-title', 'Feedback')

@section('page-css')
@endsection

@section('custom-css')
    <style>
        .dataTables_filter {
            position: absolute;
            right: 2%;
        }
    </style>
@endsection
@section('breadcrumbs')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Feedback List</h2>
            </div>
        </div>

    </div>
@endsection
@section('content')
    <section>
        <p class="mb-2">

        </p>

        <div class="card">
            <div class="card-body">

                <div class="col-sm-12 d-flex justify-content-end align-items-center">
                    @if (is_admin())
                    <a href="{{ route('feedback.create') }}" id="" type="button"
                        class="btn btn-relief-primary mb-1" style="background-color: green; color: white;">Create New</a>


                    @endif
                </div>

                <div class="table-responsive ">
                    <table id="feebackTable" class="table table-striped text-center text-nowrap">
                        <thead>
                            <tr>
                                <th style="display: none;">id</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">User</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($feedback as $feedBack)
                                <tr>
                                    <td style="display: none;"></td>
                                    <td class="text-center">{{ $feedBack->title }}</td>
                                    <td class="text-center">{{ $feedBack->description }}</td>
                                    <td class="text-center">{{ $feedBack->category->feedback_type }}</td>
                                    <td class="text-center">{{ $feedBack->user->name }}</td>
                                    {{-- <td class="text-center">{{ 1 }}</td> --}}
                                    <td class="text-center">
                                        <button class="btn btn-primary open-comment-modal"
                                            data-feedback-id="{{ $feedBack->id }}">Add Comment</button>
                                    </td>

                                    <!-- Modal for adding comment -->
                                    <div id="commentModal{{ $feedBack->id }}" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Add Comment</h4>
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <form method="POST"
                                                    action="{{ route('feedback.store_feedback_comment') }}">
                                                    @csrf
                                                    <input type="hidden" name="feedback_id" value="{{ $feedBack->id }}">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="commentContent">Comment Content</label><span
                                                                class="text-danger">*</span>
                                                            {{-- <textarea name="content" id="commentContent{{ $feedBack->id }}" class="form-control" rows="4" required></textarea> --}}
                                                            <textarea id="editor" name="content"></textarea>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('page-js')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

@endsection
@section('custom-js')
    <script>
        $(document).ready(function() {
            $('#feebackTable').DataTable({
                searching: true,
                paging: true,
                lengthMenu: [5, 10, 25],
                pageLength: 10,
                order: [
                    [5, 'asc']
                ],
                language: {
                    search: 'Search:',
                    paginate: {
                        first: '&laquo;',
                        last: '&raquo;',
                        previous: '&lsaquo;',
                        next: '&rsaquo;'
                    }
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.open-comment-modal').click(function() {
                var feedbackId = $(this).data('feedback-id');
                $('#commentModal' + feedbackId).modal('show');
            });
        });
    </script>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endsection
