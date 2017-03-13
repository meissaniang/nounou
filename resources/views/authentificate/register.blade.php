@extends ('layouts.plane')
@section ('body')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <br/><br/><br/>
                @section ('login_panel_title','Register')
                @section ('login_panel_body')
                    <form role="form" action="register" method="post">
                        {{csrf_field()}}
                        <fieldset>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                                {!! $errors->first('email') !!}
                            </div>
                            <div class="form-group">
                                <input type="text" name="prenom" class="form-control" placeholder="Prenom" required>
                                {!! $errors->first('prenom') !!}
                            </div>
                            <div class="form-group">
                                <input type="text" name="nom" class="form-control" placeholder="nom" required>
                                {!! $errors->first('nom') !!}
                            </div>
                            <div class="form-group">
                                <input type="text" name="location" class="form-control" placeholder="localite" required>
                                {!! $errors->first('location') !!}
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="mot de passe"
                                       required>
                                {!! $errors->first('password') !!}
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control"
                                       placeholder="confirmer mot de passe"
                                       required>
                                {!! $errors->first('password_confirmation') !!}
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" value="register" class="btn btn-lg btn-success btn-block">

                        </fieldset>
                    </form>

                @endsection
                @include('widgets.panel', array('as'=>'login', 'header'=>true))
            </div>
        </div>
    </div>
@stop

