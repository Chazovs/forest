@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Genome
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($genome, ['route' => ['genomes.update', $genome->id], 'method' => 'patch']) !!}

                        @include('genomes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection