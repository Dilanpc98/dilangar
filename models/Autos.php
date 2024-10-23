<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Autos".
 *
 * @property int $id_auto
 * @property string $modelo
 * @property int $anio
 * @property float $precio
 * @property string|null $color
 * @property string|null $motor
 * @property string|null $tipo
 *
 * @property ServiciosPostventa[] $serviciosPostventas
 * @property Ventas[] $ventas
 */
class Autos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Autos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['modelo', 'anio', 'precio'], 'required'],
            [['anio'], 'integer'],
            [['precio'], 'number'],
            [['modelo'], 'string', 'max' => 100],
            [['color', 'motor', 'tipo'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_auto' => Yii::t('app', 'Id Auto'),
            'modelo' => Yii::t('app', 'Modelo'),
            'anio' => Yii::t('app', 'Anio'),
            'precio' => Yii::t('app', 'Precio'),
            'color' => Yii::t('app', 'Color'),
            'motor' => Yii::t('app', 'Motor'),
            'tipo' => Yii::t('app', 'Tipo'),
        ];
    }

    /**
     * Gets query for [[ServiciosPostventas]].
     *
     * @return \yii\db\ActiveQuery|ServiciosPostventaQuery
     */
    public function getServiciosPostventas()
    {
        return $this->hasMany(ServiciosPostventa::class, ['fk_id_auto' => 'id_auto']);
    }

    /**
     * Gets query for [[Ventas]].
     *
     * @return \yii\db\ActiveQuery|VentasQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Ventas::class, ['fk_id_auto' => 'id_auto']);
    }

    /**
     * {@inheritdoc}
     * @return AutosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AutosQuery(get_called_class());
    }
}
