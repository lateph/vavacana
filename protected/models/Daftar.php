<?php

/**
 * This is the model class for table "daftar".
 *
 * The followings are the available columns in table 'daftar':
 * @property integer $id
 * @property string $tanggal
 * @property string $judul
 * @property string $namaGambar
 * @property string $namaZip
 */
class Daftar extends CActiveRecord
{
	public $gambar;
	public $zip;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'daftar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('judul, namaGambar, namaZip, mimeGambar, mimeZip', 'length', 'max'=>255),
			array('tanggal', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, time, judul, namaGambar, mimeGambar, namaZip ,mimeZip', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tanggal' => 'Tanggal',
			'judul' => 'Judul',
			'namaGambar' => 'Nama Gambar',
			'namaZip' => 'Nama Zip',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('judul',$this->judul,true);
		$criteria->compare('namaGambar',$this->namaGambar,true);
		$criteria->compare('namaZip',$this->namaZip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Daftar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getImagePath(){
		$path = Yii::app()->params['uploadPath'];
		return $path.'/daftar_images/'.$this->id.'_'.$this->namaGambar;
	}

	public function getImageUrl(){
		return Yii::app()->request->baseUrl.'/files/daftar_images/'.$this->id.'_'.$this->namaGambar;
	}

	public function getZipPath(){
		$path = Yii::app()->params['uploadPath'];
		return $path.'/daftar_zip/'.$this->id.'_'.$this->namaZip;
	}

	public function getZipUrl(){
		return Yii::app()->request->baseUrl.'/files/daftar_zip/'.$this->id.'_'.$this->namaZip;
	}

	public function beforeSave(){
		if($this->isNewRecord){
			if($this->gambar){
				$this->namaGambar = $this->gambar->getName();
				$this->mimeGambar = $this->gambar->getType();
			}
			if($this->zip){
				$this->namaZip = $this->zip->getName();
				$this->mimeZip = $this->zip->getType();
			}
			$this->time = date('Y-m-d H:i:s');
		}
		return parent::beforeSave();
	}

	public function afterSave(){
		if($this->isNewRecord){
			if($this->gambar){
				$this->gambar->saveAs($this->getImagePath());
			}
			if($this->zip){
				$this->zip->saveAs($this->getZipPath());
			}
		}
	}

	public function getIterator()
	{
        $attributes=$this->getAttributes();
        
        $attributes['imageUrl'] = $this->getImageUrl();
        $attributes['zipUrl'] = $this->getZipUrl();

        //print_r($attributes);exit;
        return new CMapIterator($attributes);
	}
}
