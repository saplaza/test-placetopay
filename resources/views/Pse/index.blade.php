@extends('Layout.app')

@section('title')
Pagos PSE
@endsection

@section('content')

    <div class="">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-9 ">

                    <form action="references-pay-add" name="refen-pay" class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <div class="form-group required">
                            <label class="control-label col-sm-4" for="type_pay">Tipo de pago</label>
                            <div class="col-sm-8">
                                <span>
                                    <select class="form-control" id="type_pay" name="type_pay" required>
                                        <option value="">Seleccione opción...</option>
                                        <option value="0">Personas</option>
                                        <option value="1">Empresa</option>
                                    </select>
                                </span>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-sm-4" for="bank_id">Banco</label>
                            <div class="col-sm-8">
                                <span>
                                    <select class="form-control" id="bank_id" name="bank" required>
                                        @foreach ($getBankList->item as $bank)
                                            <option value="{{$bank->bankCode}}">{{$bank->bankName}}</option>
                                        @endforeach
                                    </select>
                                </span>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-sm-4" for="type_document">Tipo de documento</label>
                            <div class="col-sm-8">
                                <span>
                                    <select class="form-control" id="type_document" name="document_type" required>
                                        <option value="">Seleccione opción...</option>
                                        <option value="CC">Cédula de ciudanía</option>
                                        <option value="CE">Cédula de extranjería</option>
                                        <option value="TI">Tarjeta de identidad</option>
                                        <option value="PPN">Pasaporte</option>
                                        <option value="NIT">Número de identificación tributaria</option>
                                        <option value="SSN">Social Security Number</option>
                                    </select>
                                </span>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-sm-4" for="document_number">Documento</label>
                            <div class="col-sm-8"> 
                                <span>
                                    <input type="text" class="form-control" id="document_number" name="document" placeholder="Número" required maxlength="12">
                                </span>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-sm-4" for="name">Nombre</label>
                            <div class="col-sm-8"> 
                                <span>
                                    <input type="text" class="form-control" id="name" name="first_name" placeholder="Nombres" required maxlength="60">
                                </span>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-sm-4" for="last_name">Apellidos</label>
                            <div class="col-sm-8">
                                <span>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Apellidos" required maxlength="60">
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="company">Empresa</label>
                            <div class="col-sm-8">
                                <span>
                                    <input type="text" class="form-control" id="company" name="company" required placeholder="Nombre de la compañía en la cual labora o representa" maxlength="60">
                                </span>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-sm-4" for="email_address">E-mail</label>
                            <div class="col-sm-8">
                                <span>
                                    <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Correo electrónico" required maxlength="80">
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="phone">Teléfono</label>
                            <div class="col-sm-8">
                                <span>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Número de telefo" required maxlength="20">
                                </span>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-sm-4" for="mobile">Celular</label>
                            <div class="col-sm-8">
                                <span>
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Número de celular" required maxlength="20">
                                </span>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-sm-4" for="address">Dirección</label>
                            <div class="col-sm-8">
                                <span>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Dirección postal completa" required maxlength="100">
                                </span>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-sm-4" for="province">Departamento</label>
                            <div class="col-sm-8">
                                <span>
                                    <input type="text" class="form-control" id="province" name="province" placeholder="Departamento" required maxlength="50">
                                </span>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-sm-4" for="city">Ciudad</label>
                            <div class="col-sm-8">
                                <span>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="Ciudad" required maxlength="50">
                                </span>
                            </div>
                        </div>
                        

                        <div class="form-group"> 
                            <div class="col-sm-offset-4 col-sm-8">
                                <button id="save" class="btn btn-success">Proceder al Pago</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection