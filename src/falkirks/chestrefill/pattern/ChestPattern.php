<?php
namespace falkirks\chestrefill\pattern;


use pocketmine\tile\Chest;

abstract class ChestPattern {
    /** @var Chest  */
    protected $chestTile;
    /** @var array  */
    protected $patternData;
    public function __construct(Chest $chest, array $patternData){
        $this->chestTile = $chest;
        $this->patternData = $patternData;
    }
    abstract public function apply();
    /**
     * @return Chest
     */
    public function getChestTile(){
        return $this->chestTile;
    }
    /**
     * @return array
     */
    public function getPatternData(){
        return $this->patternData;
    }
    public static function getName(){
        preg_match_all("`@pattern-name (.*)`",(new \ReflectionClass(get_called_class()))->getDocComment(), $matches);
        return $matches[1][0];
    }
    public static function getParams(){
        preg_match_all("`@pattern-params (.*)`",(new \ReflectionClass(get_called_class()))->getDocComment(), $matches);
        return json_decode($matches[1][0], true);
    }

}