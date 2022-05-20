@if($errors->any())
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger">
                <p class="lead">Os seguintes erros foram encontrados:</p>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif