<!-- Species Field -->
<div class="form-group col-sm-6">
    {!! Form::label('species', 'Species:') !!}
    {!! Form::text('species', null, ['class' => 'form-control']) !!}
</div>

<!-- Division Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('division_type_id', 'Division Type Id:') !!}
    {!! Form::text('division_type_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Life Expectancy Field -->
<div class="form-group col-sm-6">
    {!! Form::label('life_expectancy', 'Life Expectancy:') !!}
    {!! Form::text('life_expectancy', null, ['class' => 'form-control']) !!}
</div>

<!-- Beginning Fruiting From Field -->
<div class="form-group col-sm-6">
    {!! Form::label('beginning_fruiting_from', 'Beginning Fruiting From:') !!}
    {!! Form::text('beginning_fruiting_from', null, ['class' => 'form-control']) !!}
</div>

<!-- Beginning Fruiting To Field -->
<div class="form-group col-sm-6">
    {!! Form::label('beginning_fruiting_to', 'Beginning Fruiting To:') !!}
    {!! Form::text('beginning_fruiting_to', null, ['class' => 'form-control']) !!}
</div>

<!-- Sun Influence Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sun_influence', 'Sun Influence:') !!}
    {!! Form::text('sun_influence', null, ['class' => 'form-control']) !!}
</div>

<!-- First Shoots Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_shoots', 'First Shoots:') !!}
    {!! Form::text('first_shoots', null, ['class' => 'form-control']) !!}
</div>

<!-- End Growth Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_growth', 'End Growth:') !!}
    {!! Form::text('end_growth', null, ['class' => 'form-control']) !!}
</div>

<!-- Life Span Cambium Field -->
<div class="form-group col-sm-6">
    {!! Form::label('life_span_cambium', 'Life Span Cambium:') !!}
    {!! Form::text('life_span_cambium', null, ['class' => 'form-control']) !!}
</div>

<!-- Life Span Zabolon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('life_span_zabolon', 'Life Span Zabolon:') !!}
    {!! Form::text('life_span_zabolon', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('genomes.index') }}" class="btn btn-default">Cancel</a>
</div>
