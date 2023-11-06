@extends('app.layouts.main-layout')

@section('page-title', 'Comment List')

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
                <h2 class="content-header-title float-start mb-0">Comments</h2>
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

                </div>

                <div class="table-responsive ">
                    <table id="feebackTable" class="table table-striped text-center text-nowrap">
                        <thead>
                            <tr>
                                <th style="display: none;">id</th>
                                <th class="text-center">User name</th>
                                <th class="text-center">comment date</th>
                                <th class="text-center">content</th>
                                <th class="text-center">Feedback name</th>
                                @if (is_admin())
                                <th class="text-center">status</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                                <tr>
                                    <td style="display: none;"></td>
                                    <td class="text-center">{{ $comment->feedback->user->name }}</td>
                                    <td class="text-center">{{ $comment->created_at->format('Y-m-d') }}</td>
                                    <td class="text-center">{!! $comment->content !!}</td>
                                    <td class="text-center">{{ $comment->feedback->title }}</td>
                                    @if (is_admin())
                                        <td>
                                            <form action="{{ route('comment.status') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="comment_id" value="{{ $comment->id }}">


                                                @method('POST')
                                                <button type="submit"
                                                    class="btn {{ $comment->status ? 'btn-danger' : 'btn-success' }}">
                                                    {{ $comment->status ? 'Disable' : 'Enable' }}
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
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

@endsection
