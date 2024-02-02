<?php


namespace App\Services;


use Illuminate\Database\Eloquent\Model;

abstract class ModelService
{
    /**
     * @var Model
     */
    protected Model $model;

    /**
     * Set the model
     *
     * @param Model $model
     * @return self
     */
    public function setModel(Model $model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get the model
     *
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    public function getAll () {
        return $this->model->all();
    }

    public function paginate($limit = 20) {
        return $this->model->paginate($limit);
    }

    public function store (array $payload) {
        return $this->model->create($payload);
    }

    public function findById (int $id) {
        return $this->model->find($id);
    }

    public function delete (int $id) {
        return $this->model->where('id', $id)->delete();
    }

    public function udpate (array $payload, Model $model) {
        return $model->fill($payload)->save();
    }
}
