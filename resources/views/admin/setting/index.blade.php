@extends('layouts.admin')
@section('title', 'Admin Setting')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if(session('message'))
            <div class="alert alert-success mb-3">{{session('message')}}</div>
        @endif
            <form action="{{ url('/admin/web-settings')}}" method="POST">
                @csrf
                <div class="card mb-3">
                    <div class="card-header bg-info">
                        <h3 class="text-white mb-0">Website</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Website Name</label>
                                <input type="text" name="website_name" value="{{ $setting->website_name ?? ''}}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Website URL</label>
                                <input type="text" name="website_url" value="{{ $setting->website_url ?? ''}}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Page Title</label>
                                <input type="text" name="page_title" value="{{ $setting->page_title ?? ''}}" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Meta Keywords</label>
                                <textarea type="text" name="meta_keyword"  class="form-control">{{ $setting->meta_keyword ?? ''}}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Meta Description</label>
                                <textarea type="text" name="meta_description" class="form-control">{{ $setting->meta_description ?? ''}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header bg-info">
                        <h3 class="text-white mb-0">Website Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Address</label>
                                <textarea name="address" class="form-control" rows="3">{{ $setting->address ?? ''}}</textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Phone 1</label>
                                <input name="phone1" class="form-control" value="{{ $setting->phone1 ?? ''}}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Phone 2</label>
                                <input name="phone2" class="form-control" value="{{ $setting->phone2 ?? ''}}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Email Address 1</label>
                                <input name="email1" class="form-control" value="{{ $setting->email1 ?? ''}}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Email Address 2</label>
                                <input name="email2" class="form-control" value="{{ $setting->email2 ?? ''}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header bg-info">
                        <h3 class="text-white mb-0">Website - Social Media</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Facebook</label>
                                <input name="facebook" class="form-control" value="{{ $setting->facebook ?? ''}}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Twitter</label>
                                <input name="twitter" class="form-control" value="{{ $setting->twitter ?? ''}}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Instagram</label>
                                <input name="instagram" class="form-control" value="{{ $setting->instagram ?? ''}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header bg-info">
                        <h3 class="text-white mb-0">About</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">About the Clinic</label>
                                <textarea name="about" class="form-control" col="5" rows="15"> {{ $setting->about ?? ''}}</textarea>
                            </div>
                            <div class="card-header bg-info">
                                <h3 class="text-white mb-0">Frequently Asked Questions</h3>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Question 1</label>
                                <input name="faq1" class="form-control" value="{{ $setting->faq1 ?? ''}}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Answer 1</label>
                                <textarea name="ans1" class="form-control" col="5" rows="5" value="{{ $setting->ans1 ?? ''}}"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Question 2</label>
                                <input name="faq2" class="form-control" value="{{ $setting->faq2 ?? ''}}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Answer 2</label>
                                <textarea name="ans2" class="form-control" col="5" rows="5" value="{{ $setting->ans1 ?? ''}}"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Question 3</label>
                                <input name="faq3" class="form-control" value="{{ $setting->faq3 ?? ''}}">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Answer 3</label>
                                <textarea name="ans3" class="form-control" col="5" rows="5" value="{{ $setting->ans3 ?? ''}}"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button class="btn btn-info text-white" type="submit">
                        Save Setting
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
