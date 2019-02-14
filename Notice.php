<?php

namespace muhsamsul\voicenotice;
 
use Yii;
use muhsamsul\voicenotice\models\Notification as BaseNotification;
/**
* 
*/
class Notice extends BaseNotification
{
    /**
     * A new pengadaans notification
     */
    const KEY_NOTIFIKASI_BARU = 'notifikasi_baru';

    /**
     * @var array Holds all usable notifications
     */
    public static $keys = [
        self::KEY_NOTIFIKASI_BARU,
    ];


    /**
     * @inheritdoc
     */
    public function getTitle()
    {
        switch ($this->key) {
            
            case self::KEY_NOTIFIKASI_BARU:
                return Yii::t('app', 'Notifikasi Baru');
                
        }
    }

    /**
     * @inheritdoc
     */
    public function getPengadaan()
    {
        return PengadaanLangsung::findOne($this->key_id);
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {

        switch ($this->key) {

            case self::KEY_NOTIFIKASI_BARU:
                $message = PengadaanLangsung::findOne($this->key_id);
                $message->id_skpd = $message->idSkpd;
                return Yii::t('app', '{customer} mengirim sebuah pengadaan Langsung baru', [
                    'customer' => $message->idSkpd->nama
                ]);

        }
    }

    /**
     * @inheritdoc
     */
    public function getRoute()
    {

        switch ($this->key) {
            
            case self::KEY_NOTIFIKASI_BARU:
                return ['/#', 'id' => $this->key_id];

        };
    }
}
