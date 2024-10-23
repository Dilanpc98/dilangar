<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ServiciosPostventa]].
 *
 * @see ServiciosPostventa
 */
class ServiciospostventaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ServiciosPostventa[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ServiciosPostventa|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
