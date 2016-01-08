<?php

$AchieveCraft->App()->get('/api/get/group/:groupId(/)', function ($groupId) use($AchieveCraft){
    echo json_encode($AchieveCraft->getGroup($groupId));
});