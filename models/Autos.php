<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "Autos".
 *
 * @property int $id_auto
 * @property string $Portada
 * @property string $modelo
 * @property int $anio
 * @property float $precio
 * @property string $color
 * @property string $motor
 * @property string $tipo
 *
 * @property ServiciosPostventa[] $serviciosPostventas
 * @property Ventas[] $ventas
 */
class Autos extends \yii\db\ActiveRecord
{
    public $imageFile;
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
            [['Portada', 'modelo', 'anio', 'precio', 'color', 'motor', 'tipo'], 'required'],
            [['anio'], 'integer'],
            [['precio'], 'number'],
            [['Portada'], 'string', 'max' => 45],
            [['modelo'], 'string', 'max' => 100],
            [['color', 'motor', 'tipo'], 'string', 'max' => 50],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg' ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_auto' => Yii::t('app', 'Id Auto'),
            'Portada' => Yii::t('app', 'Portada'),
            'modelo' => Yii::t('app', 'Modelo'),
            'anio' => Yii::t('app', 'Anio'),
            'precio' => Yii::t('app', 'Precio'),
            'color' => Yii::t('app', 'Color'),
            'motor' => Yii::t('app', 'Motor'),
            'tipo' => Yii::t('app', 'Tipo'),
        ];
    }

    public function upload(){
        if($this->validate()){
            if($this->isNewRecord){
                if(!$this->save(false)){
                    return false;
                }
            }
 
            if($this->imageFile instanceof UploadedFile){
                $filename = $this->id_auto . '.' . $this->anion . '_modelo_' . date('Ymd_His') . '.' . $this-> imageFile->extension;
            $path = Yii::getAlias('@webroot/portadas/') . $filename;

            if($this->imageFile->saveAs($path)){
                if($this->portada && $this->portada !== $filename){
                    $this->deletePortada();
                }
                
                $this->portada = $filename;
                }
             }
             return $this->save(false);
        }
        return false;
    }

    public function deletePortada(){
        $path = Yii::getAlias('@webroot/portadas/') . $this->portadas;
            if(file_exists($path)){
                unlink($path);
            }
        }

    /**
     * Gets query for [[ServiciosPostventas]].
     *
     * @return \yii\db\ActiveQuery|ServiciospostventaQuery
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
