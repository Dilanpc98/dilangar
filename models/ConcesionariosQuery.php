<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Concesionarios]].
 *
 * @see Concesionarios
 */
class ConcesionariosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Concesionarios[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Concesionarios|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
