@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <div class="mb-3">
            <a id="atualizar-tabela" href="#/" class="btn btn-success float-left">Atualizar tabela</a>
            <a href="{{ asset('/rastreamentos/create') }}" class="btn btn-primary float-right">Cadastrar URL</a>
        </div>

        <div class="pt-5">
            <table id="rastreamentos" class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">URL</th>
                    <th scope="col">HTTP Status Code</th>
                    <th scope="col">Última consulta</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        ( function () {
            optionsDT = {}
            // optionsDT.bFilter = false;
            // optionsDT.scrollX = true;
            optionsDT.ajax = {
                url: 'rastreamentos/datatable',
                type: 'POST',
                dataSrc : '',
            };
            optionsDT.columns = [
                {data: 'id'},
                {data: 'url', render: function(data, type, row){
                    return data;
                }},
                {data: 'status_code', render: function(data, type, row){
                    return data ? parseInt(data) : ' ';
                }},
                {data: 'updated_at', render: function(data, type, row){
                    return data !== null ? (new Date(data)).toLocaleString() : 'Site ainda não rastreado';
                }},
                {data: 'id', render: function(data, type, row){
                    let url = '<a href="/rastreamentos/' + data + ' "><i class="fa-solid fa-eye"></i></a>'

                    return url;
                }},
            ];
            let table =$('#rastreamentos').DataTable(optionsDT)

            $('#atualizar-tabela').on('click', function () {
                if ( DataTable.isDataTable( '#rastreamentos' ) ) {
                    table.ajax.reload(null, false);
                }
            })

        })();
    </script>
@endpush
