<li class="{{ Request::is('tests*') ? 'active' : '' }}">
    <a href="{{ route('tests.index') }}"><i class="fa fa-edit"></i><span>Tests</span></a>
</li>

<li class="{{ Request::is('genomes*') ? 'active' : '' }}">
    <a href="{{ route('genomes.index') }}"><i class="fa fa-edit"></i><span>Genomes</span></a>
</li>

