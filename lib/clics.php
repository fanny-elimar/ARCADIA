<?php

function getAll($client):array|bool
{
    $collection = $client->arcadia->animal;
    $result = $collection->find()->toArray();

    return $result;
}

function getClicsByNames($client, $name):array|bool
{
    $collection = $client->arcadia->animal;
    $query = $collection->find(['nom' => $name]);
    $result = $query->toArray();

    return $result;
}

function getNamesByClics($client, $clics):array|bool
{
    $collection = $client->arcadia->animal;
    $query = $collection->find(['clic' => $clics]);
    $result = $query->toArray();

    return $result;
}

function addClic($client, $name)
{
    $collection = $client->arcadia->animal;
    $filter = ['name' => $name];
    $update = ['$inc' => ['clic' => 1]];
    $collection->updateOne($filter, $update);

}