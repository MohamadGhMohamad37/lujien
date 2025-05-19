@extends('admin.layout.app')
@section('title','Dashboard')
@section('content')
<div class="card">
                                        <div class="card-body">
            
                                            <h4 class="header-title">Welcome Welcome {{ Auth::user()->name }}</h4>
                                            <p class="card-title-desc">
                                                Role: {{ Auth::user()->role }}
                                            </p>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
            
@endsection