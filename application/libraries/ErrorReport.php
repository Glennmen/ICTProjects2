<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ErrorReport {

public function Error()
        {
            $htmlContent = '<div class="alert alert-danger" role="alert">';
            $htmlContent .= validation_errors();
            $htmlContent .= '</div>';
            
            return $htmlContent;
        }
}