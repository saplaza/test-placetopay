@extends('Layout.app')

@section('title')
List Payment Reference
@endsection

@section('content')
	@if(isset($_GET['returnpse']))
	<div class="alert alert-warning alert-dismissable">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Nota:</strong> El estado de la transacción es {{ $respuestaGettrans }}.
    </div>
    @endif

	<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
                <th>Código Pago</th>
                <th>Referencia</th>
                <th>Descripción</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>E-mail</th>
                <th>Respuesta</th>
                <th>Estado</th>
			</tr>
		</thead>
		<tbody>
			@foreach($list_payment_references as $list_payment_reference)
	            <tr>
	              <td>{{ substr($list_payment_reference->id, 0, 20) }}</td>
	              <td>{{ substr($list_payment_reference->reference, 0, 20) }}</td>
	              <td>{{ substr($list_payment_reference->description, 0, 20) }}</td>
	              <td>{{ substr($list_payment_reference->first_name, 0, 20) }}</td>
	              <td>{{ substr($list_payment_reference->last_name, 0, 20) }}</td>
	              <td>{{ substr($list_payment_reference->email_address, 0, 20) }}</td>
	              <td>{{ substr($list_payment_reference->status, 0, 20) }}</td>
	              <td>{{ substr($list_payment_reference->response_reason_text, 0, 50) }}</td>
	            </tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection