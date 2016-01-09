<?php

$AchieveCraft->App()->get('/api/get/groups(/)', function () use($AchieveCraft){
    $AchieveCraft->App()->response->headers->set('Content-Type', 'Content-type: application/json');
    echo json_encode($AchieveCraft->getPublicGroups());
});

$AchieveCraft->App()->get('/api/get/group/:groupId(/)', function ($groupId) use($AchieveCraft){
    $AchieveCraft->App()->response->headers->set('Content-Type', 'Content-type: application/json');
    echo json_encode($AchieveCraft->getGroup($groupId));
});