<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Servicios_Postventa".
 *
 * @property int $id_servicio
 * @property int|null $fk_id_auto
 * @property int|null $fk_id_cliente
 * @property int|null $fk_id_concesionario
 * @property string|null $tipo_servicio
 * @property string|null $fecha_servicio
 * @property float|null $costo
 *
 * @property Autos $fkIdAuto
 * @property Clientes $fkIdCliente
 * @property Concesionarios $fkIdConcesionario
 */
class Serviciospostventa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Servicios_Postventa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_id_auto', 'fk_id_cliente', 'fk_id_concesionario'], 'integer'],
            [['fecha_servicio'], 'safe'],
            [['costo'], 'number'],
            [['tipo_servicio'], 'string', 'max' => 100],
            [['fk_id_auto'], 'exist', 'skipOnError' => true, 'targetClass' => Autos::class, 'targetAttribute' => ['fk_id_auto' => 'id_auto']],
            [['fk_id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::class, 'targetAttribute' => ['fk_id_cliente' => 'id_cliente']],
            [['fk_id_concesionario'], 'exist', 'skipOnError' => true, 'targetClass' => Concesionarios::class, 'targetAttribute' => ['fk_id_concesionario' => 'id_concesionario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_servicio' => Yii::t('app', 'Id Servicio'),
            'fk_id_auto' => Yii::t('app', 'Fk Id Auto'),
            'fk_id_cliente' => Yii::t('app', 'Fk Id Cliente'),
            'fk_id_concesionario' => Yii::t('app', 'Fk Id Concesionario'),
            'tipo_servicio' => Yii::t('app', 'Tipo Servicio'),
            'fecha_servicio' => Yii::t('app', 'Fecha Servicio'),
            'costo' => Yii::t('app', 'Costo'),
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
     * Gets query for [[FkIdConcesionario]].
     *
     * @return \yii\db\ActiveQuery|ConcesionariosQuery
     */
    public function getFkIdConcesionario()
    {
        return $this->hasOne(Concesionarios::class, ['id_concesionario' => 'fk_id_concesionario']);
    }

    /**
     * {@inheritdoc}
     * @return ServiciosPostventaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ServiciosPostventaQuery(get_called_class());
    }
}
