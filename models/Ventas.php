<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Ventas".
 *
 * @property int $id_venta
 * @property int|null $fk_id_auto
 * @property int|null $fk_id_cliente
 * @property string $fecha_venta
 * @property int $cantidad
 * @property float $total
 *
 * @property Autos $fkIdAuto
 * @property Clientes $fkIdCliente
 */
class Ventas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Ventas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_id_auto', 'fk_id_cliente', 'cantidad'], 'integer'],
            [['fecha_venta', 'cantidad', 'total'], 'required'],
            [['fecha_venta'], 'safe'],
            [['total'], 'number'],
            [['fk_id_auto'], 'exist', 'skipOnError' => true, 'targetClass' => Autos::class, 'targetAttribute' => ['fk_id_auto' => 'id_auto']],
            [['fk_id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::class, 'targetAttribute' => ['fk_id_cliente' => 'id_cliente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_venta' => Yii::t('app', 'Id Venta'),
            'fk_id_auto' => Yii::t('app', 'Fk Id Auto'),
            'fk_id_cliente' => Yii::t('app', 'Fk Id Cliente'),
            'fecha_venta' => Yii::t('app', 'Fecha Venta'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'total' => Yii::t('app', 'Total'),
        ];
    }

    /**
     * Gets query for [[FkIdAuto]].
     *
     * @return \yii\db\ActiveQuery|AutosQuery
     */
    public function getFkIdAuto()
    {
        return $this->hasOne(Autos::class, ['id_auto' => 'fk_id_auto']);
    }

    /**
     * Gets query for [[FkIdCliente]].
     *
     * @return \yii\db\ActiveQuery|ClientesQuery
     */
    public function getFkIdCliente()
    {
        return $this->hasOne(Clientes::class, ['id_cliente' => 'fk_id_cliente']);
    }

    /**
     * {@inheritdoc}
     * @return VentasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VentasQuery(get_called_class());
    }
}
