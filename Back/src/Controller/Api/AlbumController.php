<?php

namespace App\Controller\Api;

use App\Entity\Album;
use App\Repository\AlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class AlbumController extends AbstractController
{
    /**
     * Liste all albums
     * 
     * @Route("/api/albums", name="app_api_album_browse", methods={"GET"})
     */
    public function browse(AlbumRepository $albumRepository): JsonResponse
    {
        // List all albums
        $allAlbums = $albumRepository->findAll();

        return $this->json(
            // Data
            $allAlbums,
            // Status code
            200,
            // HTTP headers
            [],
            // Serialization contexts
            [
                "groups" =>
                [
                    "album_browse"
                ]
            ]

        );     
    }

    /**
     * Select specific album
     *
     * @param int $id
     * @param AlbumRepository $albumRepository
     * @return JsonResponse
     * 
     * @Route("api/albums/{id}",name="app_api_album_read", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function read($id, AlbumRepository $albumRepository): JsonResponse
    {
        // find all album
        $album = $albumRepository->find($id);

        // 404 management
        if ($album === null){
            return $this->json(["message"=>"Cet album n'existe pas"], Response::HTTP_NOT_FOUND);
        }

        return $this->json($album,200,[],[
                "groups" =>
                [
                    "album_browse",
                    "album_read"
                ]
            ]
        );
    }

    /**
     * Add new Album
     *
     * @param Request $request
     * @param SerializerInterface $serializerInterface
     * @param AlbumRepository $albumRepository
     * @return JsonResponse
     * 
     * @Route("/api/albums", name="app_api_album_add", methods={"POST"})
     */
    public function add (Request $request, SerializerInterface $serializerInterface, AlbumRepository $albumRepository )
    {
        // Select Json content
        $jsonContent = $request->getContent();

        //
        $newAlbum = $serializerInterface->deserialize(
            // data to transform
            $jsonContent,
            // Type of object we want to deserialize
            Album::class,
            // Format
            "json"
            
        );

        $albumRepository->add($newAlbum, true);

        return $this->json(
            // data
            $newAlbum,
            // status code
            Response::HTTP_CREATED,
            // headers
            [],
            // context
            [
                "groups" =>
                [
                    "album_read"
                ]
            ]
        );     
    }

    /**
     * Edit specific album
     *
     * @param int $id
     * @param Request $request
     * @param AlbumRepository $albumRepository
     * @param SerializerInterface $serializerInterface
     * @return JsonResponse
     * 
     * @Route("api/albums/{id}",name="app_api_album_edit", requirements={"id"="\d+"}, methods={"PUT", "PATCH"})
     */
    public function edit($id, Request $request, AlbumRepository $albumRepository, SerializerInterface $serializerInterface)
    {
        // 1. Select Json content
        $jsonContent = $request->getContent();

        // 2. Find album on Database
        $album = $albumRepository->find($id);

        // 3. deserialize and update
        $serializerInterface->deserialize( 
            // data
            $jsonContent,
            // type
            Album::class, 
            // Format
            "json",
            // context
            [AbstractNormalizer::OBJECT_TO_POPULATE => $album]
        );

        $albumRepository->add($album,true);

        return $this->json(
            // data
            $album,
            // code status
            Response::HTTP_OK,
            // headers
            [],
            // context
            [
                "groups" =>
                [
                    "album_read",
                    "genre_browse"
                ]
            ]

        );

    }

    /**
     * Delete specific album
     *
     * @param int $id
     * @param AlbumRepository $albumRepository
     * 
     * @Route("api/albums/{id}",name="app_api_album_delete", requirements={"id"="\d+"}, methods={"DELETE"})
     */
    public function delete($id, AlbumRepository $albumRepository)
    {
        $album = $albumRepository->find($id);
        $albumRepository->remove($album,true);

        return $this->json(null, Response::HTTP_NO_CONTENT);

    }




}