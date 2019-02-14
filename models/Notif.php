<?php

namespace muhsamsul\voicenotice\models;

use Yii;
use soul\voicenotice\models\Notification as BaseNotification;

class Notif extends BaseNotification
{

    /**
     * A new message notification
     */
    const KEY_NOTIFIKASI_BARU = 'notifikasi_baru';
    /**
     * A new notification for status is change
     */

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
    public function getDescription()
    {

        switch ($this->key) {
            case self::KEY_NOTIFIKASI_BARU:
                return Yii::t('app', '{customer} mengirim sebuah notifikasi baru', [
                    'customer' => "Notif New"
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
                return ['/pengadaan/pengadaan-langsung/update-dokumen', 'id' => $this->key_id];
        };
    }

}