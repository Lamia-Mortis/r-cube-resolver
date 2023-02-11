<?php 

declare(strict_types=1);

namespace App\Factories; 

use App\Services\DTOs\DataInterface; 
use App\Services\DTOs\FlexibleConfig\FlexibleConfigData; 
use Illuminate\Http\Request; 

class FlexibleConfigFactory extends AbstractServiceFactory 
{
    public static function createDto(object|array $data): DataInterface 
    {
        return match(true) {
            $data instanceof Request      => FlexibleConfigData::fromRequest($data), 
            gettype($data) === 'object'   => FlexibleConfigData::fromObject($data), 
            default                       => FlexibleConfigData::fromArray($data),
        };
    }
}