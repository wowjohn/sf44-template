<?php
/**
 * Created by PhpStorm.
 * User: baofan
 * Date: 2019/11/26
 * Time: 13:16.
 */

namespace App\Controller;

use App\Entity\User;
use Exception;
use Godruoyi\Snowflake\Snowflake;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends AbstractController
{
    public function index()
    {
        $product = $this->getDoctrine()
            ->getRepository(User::class)
            ->find(1);

        return new Response('Check out this great product: ' . $product->getNickname());
    }

    /**
     * generateUniqueId.
     *
     * @throws Exception
     *
     * @return Response
     *
     * @author baofan
     */
    public function generateUniqueId()
    {
        $snowflake = new Snowflake();

        $snowflake->setStartTimeStamp(strtotime('2019-01-01') * 1000);

        $id = date('YmdHis') . $snowflake->id();

        return $this->json(
            [
                'id' => $id,
                'length' => strlen($id),
            ]
        );
    }
}
