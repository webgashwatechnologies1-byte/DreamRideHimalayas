@extends('admin.layout')

@section('content')

<div id="wrapper">
    <div id="pagee" class="clearfix">

        @include('admin.components.sidebar')

        <div class="has-dashboard">

            @include('admin.components.header')

            <main id="main">
                <section class="profile-dashboard">

                    <div class="inner-header mb-40 d-flex justify-content-between align-items-center">
                        <h3 class="title">All Pages</h3>
                        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">Add New Page</a>
                    </div>

                    <!-- SAME DASHBOARD WRAPPER -->
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12">

                            <!-- THIS MAKES IT MATCH THE DASHBOARD -->
                            <div class="page-insight">
                                <div class="wg-box p-4">

                                    <div class="table-responsive" style="overflow-x:auto; white-space:nowrap;">
                                            <table class="table table-striped align-middle" style="min-width:900px;">
                                                <thead class="table-dark">
                                                    <tr>
                                                        {{-- <th style="padding:18px;">ID</th> --}}
                                                        <th style="padding:18px;">Title</th>
                                                        <th style="padding:18px;">Slug</th>
                                                        <th style="padding:18px;">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pages as $page)
                                                    <tr style="height:65px;">
                                                        {{-- <td>{{ $page->id }}</td> --}}
                                                        <td><strong>{{ ucfirst($page->title) }}</strong></td>
                                                        <td>{{ $page->slug }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-sm btn-info">Edit</a>

                                                            @if(!in_array($page->slug, ['home', 'about-us']))
                                                                <form action="{{ route('admin.pages.destroy', $page->id) }}" method="POST"
                                                                    style="display:inline-block;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                                </form>
                                                            @else
                                                                <span class="badge bg-success">Fixed</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>


                                </div>
                            </div>
                            <!-- END MATCH AREA -->

                        </div>
                    </div>

                </section>
            </main>

            {{-- @include('admin.components.footer') --}}

        </div>
    </div>
</div>

@endsection
