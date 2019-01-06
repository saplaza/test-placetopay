@extends('Layout.app')

@section('title')
Pagos PSE
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="toolbar">
                <ul class="breadcrumb">
                    <li>
                        <a href="home"><span data-phrase="HomePage" class="glyphicon glyphicon-home ewIcon" data-caption="Inicio"></span></a>
                    </li>
                    <li class="active">
                        Realizar Pago
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-4">

                    <form name="form-payment" class="form-horizontal">
                        <div class="form-group required">
                            <label class="control-label col-sm-4" for="type_pay">Tipo de pago</label>
                            <div class="col-sm-8">
                                <span>
                                    <select class="form-control" id="type_pay" name="type_pay">
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
                                    <select class="form-control" id="bank_id" name="bank_id">
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
                                    <select class="form-control" id="type_document" name="type_document">
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
                                    <input type="text" class="form-control" id="document_number" name="document_number" placeholder="Número">
                                </span>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-sm-4" for="name">Nombre</label>
                            <div class="col-sm-8"> 
                                <span>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombres">
                                </span>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-sm-4" for="last_name">Apellidos</label>
                            <div class="col-sm-8">
                                <span>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Apellidos">
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="company">Empresa</label>
                            <div class="col-sm-8">
                                <span>
                                    <input type="text" class="form-control" id="company" name="company" placeholder="Nombre de la compañía en la cual labora o representa">
                                </span>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-sm-4" for="email_address">E-mail</label>
                            <div class="col-sm-8">
                                <span>
                                    <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Correo electrónico">
                                </span>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-sm-4" for="address">Dirección</label>
                            <div class="col-sm-8">
                                <span>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Dirección postal completa">
                                </span>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-sm-4" for="province">Departamento</label>
                            <div class="col-sm-8">
                                <span>
                                    <select class="form-control" id="province" name="province">
                                        <option value="">Seleccione opción...</option>
                                    </select>
                                </span>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-sm-4" for="city">Ciudad</label>
                            <div class="col-sm-8">
                                <span>
                                    <select class="form-control" id="city" name="city">
                                        <option value="">Seleccione opción...</option>
                                    </select>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="phone">Teléfono</label>
                            <div class="col-sm-8">
                                <span>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Número de telefo">
                                </span>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label class="control-label col-sm-4" for="x_mobile">Celular</label>
                            <div class="col-sm-8">
                                <span id="el_mobile">
                                    <input type="text" class="form-control" id="x_mobile" name="x_mobile" placeholder="Número de celular">
                                </span>
                            </div>
                        </div>

                        <div class="form-group"> 
                            <div class="col-sm-offset-4 col-sm-8">
                                <button id="btn_save" name="btn_save" class="btn btn-primary btn_save">Realizar Pago</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection