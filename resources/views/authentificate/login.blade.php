@extends ('layouts.plane')
@section ('body')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <br /><br /><br />
                @section ('login_panel_title','Espace Membre')
                @section ('login_panel_body')
                    <form role="form" action="login" method="post">
                        {{csrf_field()}}

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @endif
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" value="Login" class="btn btn-lg btn-success btn-block">
                        </fieldset>
                    </form>

                @endsection
                @include('widgets.panel', array('as'=>'login', 'header'=>true))
            </div>
        </div>
    </div>
@stop