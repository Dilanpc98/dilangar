<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Concesionarios".
 *
 * @property int $id_concesionario
 * @property string $nombre
 * @property string|null $direccion
 * @property string|null $telefono
 * @property string|null $correo
 *
 * @property ServiciosPostventa[] $serviciosPostventas
 */
class Concesionarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Concesionarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre', 'correo'], 'string', 'max' => 100],
            [['direccion'], 'string', 'max' => 200],
            [['telefono'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_concesionario' => Yii::t('app', 'Id Concesionario'),
            'nombre' => Yii::t('app', 'Nombre'),
            'direccion' => Yii::t('app', 'Direccion'),
            'telefono' => Yii::t('app', 'Telefono'),
            'correo' => Yii::t('app', 'Correo'),
        ];
    }

    /**
     * Gets query for [[ServiciosPostventas]].
     *
     * @return \yii\db\ActiveQuery|ServiciosPostventaQuery
     */
    public function getServiciosPostventas()
    {
        return $this->hasMany(ServiciosPostventa::class, ['fk_id_concesionario' => 'id_concesionario']);
    }

    /**
     * {@inheritdoc}
     * @return ConcesionariosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConcesionariosQuery(get_called_class());
    }
}
