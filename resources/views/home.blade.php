@extends('layouts.app')

@section('content')
<div class="container-contact100">

    <div class="wrap-contact100">
        <form method="post" action="{{ route('import') }}" enctype="multipart/form-data" class="contact100-form validate-form">
            <span class="contact100-form-title">
                <strong> Fiche téléphone </strong>
            </span>

            <div class="wrap-input100 validate-input" data-validate="Merci d'importer la liste des téléphone dans un fichier Excel">
                {{ csrf_field() }}
                <div class="custom-file">
                    <input class="input100 custom-file-input" type="file" name="mon_fichier" placeholder="fichier EXCEL" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                    <label class="custom-file-label" for="inputGroupFile04">Choisir un fichier Excel</label>
                  </div>
                {{-- <input class="input100" type="text" name="name" placeholder="Full Name"> --}}
                <span class="focus-input100"></span>
            </div>

            <div class="container-contact100-form-btn">
                <button type="submit" class="contact100-form-btn">
                    <span>
                        <i class="fa fa-file-excel-o m-r-6" aria-hidden="true"></i>
                            C reva :D
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>



<div id="dropDownSelect1"></div>

@endsection
