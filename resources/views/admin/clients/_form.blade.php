{{csrf_field()}}
<input type="hidden" name="client_type" value="{{$clientType}}">
<div class="form-group">
    <label for="name">Nome</label>
    <input class="form-control" id="name" name="name" value="{{old('name',$client->name)}}">
</div>

<div class="form-group">
    <label for="document_number">Documento</label>
    <input class="form-control" id="document_number" name="document_number"
           value="{{old('document_number',$client->document_number)}}">
</div>

<div class="form-group">
    <label for="email">E-mail</label>
    <input class="form-control" id="email" name="email" type="email" value="{{old('email',$client->email)}}">
</div>

<div class="form-group">
    <label for="phone">Telefone</label>
    <input class="form-control" id="phone" name="phone" value="{{old('phone',$client->phone)}}">
</div>

@if($clientType == \App\Client::TYPE_INDIVIDUAL)
    @php
        $maritalStatus = $client->marital_status;
    @endphp
    <div class="form-group">
        <label for="marital_status">Estado Civil</label>
        <select class="form-control" name="marital_status" id="marital_status" value="{{$maritalStatus}}">
            <option value="">Selecione o estado civil</option>
            <option value="1" {{old('marital_status',$maritalStatus) == 1 ?'selected="selected"': ''}}>Solteiro</option>
            <option value="2" {{old('marital_status',$maritalStatus) == 2 ?'selected="selected"': ''}}>Casado</option>
            <option value="3" {{old('marital_status',$maritalStatus) == 3 ?'selected="selected"': ''}}>Divorciado
            </option>
        </select>
    </div>
    <div class="form-group">
        <label for="date_birth">Data Nasc.</label>
        <input class="form-control" id="date_birth" name="date_birth" type="date"
               value="{{old('date_birth',$client->date_birth)}}">
    </div>

    @php
        $sex = $client->sex;
    @endphp
    <div class="radio">
        <label>
            <input type="radio" name="sex" value="m" {{old('sex',$sex) == 'm'?'checked="checked"': ''}}> Masculino
        </label>
    </div>

    <div class="radio">
        <label>
            <input type="radio" name="sex" value="f" {{old('sex',$sex) == 'f'?'checked="checked"': ''}}> Feminino
        </label>
    </div>

    <div class="form-group">
        <label for="physical_disability">Deficiência Física</label>
        <input class="form-control" id="physical_disability" name="physical_disability"
               value="{{old('physical_disability',$client->physical_disability)}}">
    </div>
@else
    <div class="form-group">
        <label for="company_name">Nome Fantasia</label>
        <input class="form-control" id="company_name" name="company_name"
               value="{{old('company_name',$client->company_name)}}">
    </div>
@endif
<div class="checkbox">
    <label>
        <input id="defaulter" name="defaulter"
               type="checkbox" {{old('defaulter',$client->defaulter) ?'checked="checked"': ''}}>
        Inadimplente?
    </label>
</div>