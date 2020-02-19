<?php

namespace App\DataTables;

use App\Models\genome;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class genomeDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'genomes.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\genome $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(genome $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'species',
            'division_type_id',
            'life_expectancy',
            'beginning_fruiting_from',
            'beginning_fruiting_to',
            'sun_influence',
            'first_shoots',
            'end_growth',
            'life_span_cambium',
            'life_span_zabolon'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'genomesdatatable_' . time();
    }
}
