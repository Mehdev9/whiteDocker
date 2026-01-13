<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DockerInfoController extends Controller
{
    public function info()
    {
        $dockerInfo = [];
        
        // Check if Docker is available
        exec('docker --version 2>&1', $versionOutput, $versionReturnCode);
        $dockerInfo['version'] = $versionReturnCode === 0 ? implode("\n", $versionOutput) : 'Docker not found';
        
        // Get Docker info
        exec('docker info --format "{{json .}}" 2>&1', $infoOutput, $infoReturnCode);
        if ($infoReturnCode === 0) {
            $dockerInfo['info'] = json_decode(implode('', $infoOutput), true);
        } else {
            $dockerInfo['info'] = null;
            $dockerInfo['error'] = implode("\n", $infoOutput);
        }
        
        // Get running containers
        exec('docker ps --format "{{json .}}" 2>&1', $containersOutput, $containersReturnCode);
        if ($containersReturnCode === 0) {
            $dockerInfo['containers'] = array_map(function($line) {
                return json_decode($line, true);
            }, array_filter($containersOutput));
        } else {
            $dockerInfo['containers'] = [];
        }
        
        // Get images
        exec('docker images --format "{{json .}}" 2>&1', $imagesOutput, $imagesReturnCode);
        if ($imagesReturnCode === 0) {
            $dockerInfo['images'] = array_map(function($line) {
                return json_decode($line, true);
            }, array_filter($imagesOutput));
        } else {
            $dockerInfo['images'] = [];
        }
        
        return view('docker.info', compact('dockerInfo'));
    }
}