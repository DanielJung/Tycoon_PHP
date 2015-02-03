<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author daniel
 */

require_once __DIR__ . '/../CPPInterface.php';

class User {
    private $miID;
    private $msEmail;
    private $msPassword;
    private $msHash;
    
    public function __construct() {
        $this->miID = 0;
    }
    public function isLoggedIn() {
        return $this->miID!=0;
    }
    public function getID() {
        return $this->miID;
    }
    public function getEmail() {
        return $this->msEmail;
    }
    public function setEmail($sEmail){
        $this->msEmail = $sEmail;
    }
    public function getPassword() {
        return $this->msPassword;
    }
    public function setPassword($sPassword) {
        $this->msPassword = $sPassword;
    }
    public function getHash() {
        return $this->msHash;
    }
    public function setHash($sHash) {
        $this->msHash = $sHash;
    }
    public function ManualLogin($sEmail, $sPassword) {
        if(isset($sEmail) && isset($sPassword)) {
            $aData = array('email' => $sEmail,
                    'password' => $sPassword);
            $result = json_decode(CPPInterface::getCPPResult('user/login', $aData), true);
            if(isset($result['error'])) {
                throw new \Exception($result['error']);
            }
            $this->miID = $result['userid'];
            $this->msHash = $result['hash'];
            $this->msEmail = $result['email'];
            
            return $result['message'];
        }
        throw new \Exception("Error Login: Email or Password");
    }
    public function AutoLogin($iID, $sHash) {
        if(isset($iID) && isset($sHash)) {
            $aData = array('userid' => $iID,
                    'hash' => $sHash);
            $result = json_decode(CPPInterface::getCPPResult('user/login', $aData), true);
            if(isset($result['error'])) {
                throw new \Exception($result['error']);
            }
            $this->miID = $result['userid'];
            $this->msHash = $result['hash'];
            $this->msEmail = $result['email'];
            
            return $result['message'];
        }
        throw new \Exception("Error Login: ID or Hash not set");
    }
    public function Register($sEmail, $sPassword, $sPasswordRpt) {
        if(isset($sEmail) && isset($sPassword) && isset($sPasswordRpt)) {
            $aData = array('email' => $sEmail,
                'password' => $sPassword,
                'passwordrpt' => $sPasswordRpt);
            $result =  json_decode(CPPInterface::getCPPResult('user/register', $aData), true);
            if(isset($result['error'])) {
                throw new \Exception($result['error']);
            }
            return $result['message'];
        }
        throw new \Exception("Error Register: Email, Password or Passwordrpt not set");
    }
    public function Activate($sCode) {
        if(isset($sCode)) {
            $aData = array('code' => $sCode);
            $result = json_decode(CPPInterface::getCPPResult('user/activate', $aData), true);
            if(isset($result['error'])) {
                throw new \Exception($result['error']);
            }
            return $result['message'];
        }
        throw new \Exception("Error Activate: Code not set");
    }
    public function Logout() {
        $aData = array('userid' => $this->miID,
            'hash' => $this->msHash);
        CPPInterface::getCPPResult('user/logout', $aData);
    }
    public function getPrivateProfile($sName, $sNick, $sGender, $sAge, $sHome, $sWebsite) {
        $aData = array("id" => $this->getID(), "hash" => $this->getHash(),
            "name" => $sName, "nick" => $sNick, "gender" => $sGender,
            "age" => $sAge, "home" => $sHome, "website" => $sWebsite);
        return json_decode(CPPInterface::getCPPResult('user/profile', $aData), true);
    }
    public function getPublicProfile($iUserID) {
        $aData = array("userid" => $iUserID);
        return json_decode(CPPInterface::getCPPResult('user/profile', $aData), true);
    }
}