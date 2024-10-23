<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Clientes".
 *
 * @property int $id_cliente
 * @property string $nombre
 * @property string|null $direccion
 * @property string|null $telefono
 * @property string|null $correo
 * @property string|null $fecha_registro
 *
 * @property ServiciosPostventa[] $serviciosPostventas
 * @property Ventas[] $ventas
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['fecha_registro'], 'safe'],
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
            'id_cliente' => Yii::t('app', 'Id Cliente'),
            'nombre' => Yii::t('app', 'Nombre'),
            'direccion' => Yii::t('app', 'Direccion'),
            'telefono' => Yii::t('app', 'Telefono'),
            'correo' => Yii::t('app', 'Correo'),
            'fecha_registro' => Yii::t('app', 'Fecha Registro'),
        ];
    }

    /**
     * Gets query for [[ServiciosPostventas]].
     *
     * @return \yii\db\ActiveQuery|ServiciosPostventaQuery
     */
    public function getServiciosPostventas()
    {
        return $this->hasMany(ServiciosPostventa::class, ['fk_id_cliente' => 'id_cliente']);
    }

    /**
     * Gets query for [[Ventas]].
     *
     * @return \yii\db\ActiveQuery|VentasQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Ventas::class, ['fk_id_cliente' => 'id_cliente']);
    }

    /**
     * {@inheritdoc}
     * @return ClientesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClientesQuery(get_called_class());
    }
}
