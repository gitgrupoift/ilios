<?php

namespace Tests\IliosApiBundle\Endpoints;

use Ilios\CoreBundle\Entity\OfferingInterface;
use Symfony\Component\HttpFoundation\Response;
use Tests\IliosApiBundle\AbstractEndpointTest;
use DateTime;

/**
 * UsereventTest API endpoint Test.
 * @package Tests\IliosApiBundle\Endpoints
 * @group api_1
 */
class UsereventTest extends AbstractEndpointTest
{
    /**
     * @inheritdoc
     */
    protected function getFixtures()
    {
        return [
            'Tests\CoreBundle\Fixture\LoadOfferingData',
            'Tests\CoreBundle\Fixture\LoadIlmSessionData',
            'Tests\CoreBundle\Fixture\LoadUserData',
            'Tests\CoreBundle\Fixture\LoadSessionData',
            'Tests\CoreBundle\Fixture\LoadSessionDescriptionData',
            'Tests\CoreBundle\Fixture\LoadLearningMaterialData',
            'Tests\CoreBundle\Fixture\LoadCourseLearningMaterialData',
            'Tests\CoreBundle\Fixture\LoadSessionLearningMaterialData',
        ];
    }

    public function testGetEvents()
    {
        $offerings = $this->container->get('Tests\CoreBundle\DataLoader\OfferingData')->getAll();
        $sessionTypes = $this->container->get('Tests\CoreBundle\DataLoader\SessionTypeData')->getAll();
        $learningMaterials = $this->container->get('Tests\CoreBundle\DataLoader\LearningMaterialData')->getAll();
        $sessionDescriptions = $this->container->get('Tests\CoreBundle\DataLoader\SessionDescriptionData')->getAll();
        $ilmSessions = $this->container->get('Tests\CoreBundle\DataLoader\IlmSessionData')->getAll();
        $courses = $this->container->get('Tests\CoreBundle\DataLoader\CourseData')->getAll();

        $userId = 2;

        $events = $this->getEvents($userId, 0, 100000000000);

        $this->assertEquals(12, count($events), 'Expected events returned');
        $this->assertEquals(
            $events[0]['offering'],
            3,
            'offering is correct for event 0'
        );
        $this->assertEquals(
            $events[0]['startDate'],
            $offerings[2]['startDate'],
            'startDate is correct for event 0'
        );
        $this->assertEquals(
            $events[0]['endDate'],
            $offerings[2]['endDate'],
            'endDate is correct for event 0'
        );
        $this->assertEquals($events[0]['courseTitle'], $courses[0]['title'], 'title is correct for event 0');
        $this->assertEquals(
            $events[0]['courseExternalId'],
            $courses[0]['externalId'],
            'course external id correct for event 0'
        );
        $this->assertEquals(
            $events[0]['sessionTypeTitle'],
            $sessionTypes[1]['title'],
            'session type title is correct for event 0'
        );
        $this->assertEquals(
            $events[0]['sessionDescription'],
            $sessionDescriptions[1]['description'],
            'session description is correct for event 0'
        );
        $this->assertEquals(
            count($events[0]['learningMaterials']),
            3,
            'Event 0 has the correct number of learning materials'
        );
        $this->assertTrue(
            $events[0]['attireRequired'],
            'attire is correct for event 0'
        );
        $this->assertTrue(
            $events[0]['equipmentRequired'],
            'equipmentRequired is correct for event 0'
        );
        $this->assertTrue(
            $events[0]['supplemental'],
            'supplemental is correct for event 0'
        );
        $this->assertTrue(
            $events[0]['attendanceRequired'],
            'attendanceRequired is correct for event 0'
        );

        $this->assertEquals($events[1]['offering'], 4, 'offering is correct for event 1');
        $this->assertEquals(
            $events[1]['startDate'],
            $offerings[3]['startDate'],
            'startDate is correct for event 1'
        );
        $this->assertEquals($events[1]['endDate'], $offerings[3]['endDate'], 'endDate is correct for event 1');
        $this->assertEquals($events[1]['courseTitle'], $courses[0]['title'], 'title is correct for event 1');
        $this->assertEquals(
            $events[1]['courseExternalId'],
            $courses[0]['externalId'],
            'course external id correct for event 1'
        );
        $this->assertEquals(
            $events[1]['sessionTypeTitle'],
            $sessionTypes[1]['title'],
            'session type title is correct for event 1'
        );
        $this->assertEquals(
            $events[1]['sessionDescription'],
            $sessionDescriptions[1]['description'],
            'session description is correct for event 1'
        );
        $this->assertEquals(
            count($events[1]['learningMaterials']),
            3,
            'Event 1 has the correct number of learning materials'
        );
        $this->assertTrue(
            $events[1]['attireRequired'],
            'attire is correct for event 1'
        );
        $this->assertTrue(
            $events[1]['equipmentRequired'],
            'equipmentRequired is correct for event 1'
        );
        $this->assertTrue(
            $events[1]['supplemental'],
            'supplemental is correct for event 1'
        );
        $this->assertTrue(
            $events[1]['attendanceRequired'],
            'attendanceRequired is correct for event 1'
        );

        $this->assertEquals($events[2]['offering'], 5, 'offering is correct for event 2');
        $this->assertEquals(
            $events[2]['startDate'],
            $offerings[4]['startDate'],
            'startDate is correct for event 2'
        );
        $this->assertEquals($events[2]['endDate'], $offerings[4]['endDate'], 'endDate is correct for event 2');
        $this->assertEquals($events[2]['courseTitle'], $courses[0]['title'], 'title is correct for event 2');
        $this->assertEquals(
            $events[2]['courseExternalId'],
            $courses[0]['externalId'],
            'course external id correct for event 2'
        );
        $this->assertEquals(
            $events[2]['sessionTypeTitle'],
            $sessionTypes[1]['title'],
            'session type title is correct for event 2'
        );
        $this->assertEquals(
            $events[2]['sessionDescription'],
            $sessionDescriptions[1]['description'],
            'session description is correct for event 2'
        );
        $this->assertEquals(
            count($events[2]['learningMaterials']),
            3,
            'Event 2 has the correct number of learning materials'
        );
        $this->assertTrue(
            $events[2]['attireRequired'],
            'attire is correct for event 2'
        );
        $this->assertTrue(
            $events[2]['equipmentRequired'],
            'equipmentRequired is correct for event 2'
        );
        $this->assertTrue(
            $events[2]['supplemental'],
            'supplemental is correct for event 2'
        );
        $this->assertTrue(
            $events[2]['attendanceRequired'],
            'attendanceRequired is correct for event 2'
        );

        $this->assertEquals($events[3]['offering'], 6, 'offering is correct for event 3');
        $this->assertEquals($events[3]['startDate'], $offerings[5]['startDate'], 'startDate is correct for event 3');
        $this->assertEquals($events[3]['endDate'], $offerings[5]['endDate'], 'endDate is correct for event 3');
        $this->assertEquals($events[3]['courseTitle'], $courses[1]['title'], 'title is correct for event 3');
        $this->assertEquals(
            $events[3]['courseExternalId'],
            $courses[1]['externalId'],
            'course external id correct for event 3'
        );
        $this->assertEquals(
            $events[3]['sessionTypeTitle'],
            $sessionTypes[1]['title'],
            'session type title is correct for event 3'
        );
        $this->assertEquals(count($events[3]['learningMaterials']), 0, 'Event 3 has no learning materials');

        $this->assertFalse(
            $events[3]['attireRequired'],
            'attire is correct for event 3'
        );
        $this->assertFalse(
            $events[3]['equipmentRequired'],
            'equipmentRequired is correct for event 3'
        );
        $this->assertTrue(
            $events[3]['supplemental'],
            'supplemental is correct for event 3'
        );
        $this->assertArrayNotHasKey(
            'attendanceRequired',
            $events[3],
            'attendanceRequired is correct for event 3'
        );

        $this->assertEquals($events[4]['offering'], 7, 'offering is correct for event 4');
        $this->assertEquals($events[4]['startDate'], $offerings[6]['startDate'], 'startDate is correct for event 4');
        $this->assertEquals($events[4]['endDate'], $offerings[6]['endDate'], 'endDate is correct for event 4');
        $this->assertEquals($events[4]['courseTitle'], $courses[1]['title'], 'title is correct for event 4');
        $this->assertEquals(
            $events[4]['courseExternalId'],
            $courses[1]['externalId'],
            'course external id correct for event 4'
        );
        $this->assertEquals(
            $events[4]['sessionTypeTitle'],
            $sessionTypes[1]['title'],
            'session type title is correct for event 4'
        );
        $this->assertEquals(count($events[4]['learningMaterials']), 0, 'Event 4 has no learning materials');

        $this->assertFalse(
            $events[4]['attireRequired'],
            'attire is correct for event 4'
        );
        $this->assertFalse(
            $events[4]['equipmentRequired'],
            'equipmentRequired is correct for event 4'
        );
        $this->assertTrue(
            $events[4]['supplemental'],
            'supplemental is correct for event 4'
        );
        $this->assertArrayNotHasKey(
            'attendanceRequired',
            $events[4],
            'attendanceRequired is correct for event 4'
        );

        $this->assertEquals($events[5]['ilmSession'], 1, 'ilmSession is correct for 5');
        $this->assertEquals($events[5]['startDate'], $ilmSessions[0]['dueDate'], 'dueDate is correct for 5');
        $this->assertEquals($events[5]['courseTitle'], $courses[1]['title'], 'title is correct for 5');
        $this->assertEquals(
            $events[5]['courseExternalId'],
            $courses[1]['externalId'],
            'course external id correct for event 5'
        );
        $this->assertEquals(
            $events[5]['sessionTypeTitle'],
            $sessionTypes[0]['title'],
            'session type title is correct for event 5'
        );
        $this->assertEquals(count($events[5]['learningMaterials']), 0, 'Event 5 has no learning materials');

        $this->assertFalse(
            $events[5]['attireRequired'],
            'attire is correct for event 5'
        );
        $this->assertFalse(
            $events[5]['equipmentRequired'],
            'equipmentRequired is correct for event 5'
        );
        $this->assertFalse(
            $events[5]['supplemental'],
            'supplemental is correct for event 5'
        );
        $this->assertArrayNotHasKey(
            'attendanceRequired',
            $events[5],
            'attendanceRequired is correct for event 5'
        );

        $this->assertEquals($events[6]['ilmSession'], 2, 'ilmSession is correct for event 6');
        $this->assertEquals($events[6]['startDate'], $ilmSessions[1]['dueDate'], 'dueDate is correct for event 6');
        $this->assertEquals($events[6]['courseTitle'], $courses[1]['title'], 'ilmSession is correct for event 6');
        $this->assertEquals(
            $events[6]['courseExternalId'],
            $courses[1]['externalId'],
            'course external id correct for event 6'
        );
        $this->assertEquals(
            $events[6]['sessionTypeTitle'],
            $sessionTypes[0]['title'],
            'session type title is correct for event 6'
        );
        $this->assertEquals(count($events[6]['learningMaterials']), 0, 'Event 6 has no learning materials');
        $this->assertFalse(
            $events[6]['attireRequired'],
            'attire is correct for event 6'
        );
        $this->assertFalse(
            $events[6]['equipmentRequired'],
            'equipmentRequired is correct for event 6'
        );
        $this->assertFalse(
            $events[6]['supplemental'],
            'supplemental is correct for event 6'
        );
        $this->assertArrayNotHasKey(
            'attendanceRequired',
            $events[6],
            'attendanceRequired is correct for event 6'
        );

        $this->assertEquals($events[7]['ilmSession'], 3, 'ilmSession is correct for event 7');
        $this->assertEquals($events[7]['startDate'], $ilmSessions[2]['dueDate'], 'dueDate is correct for event 7');
        $this->assertEquals($events[7]['courseTitle'], $courses[1]['title'], 'title is correct for event 7');
        $this->assertEquals(
            $events[7]['courseExternalId'],
            $courses[1]['externalId'],
            'course external id correct for event 7'
        );
        $this->assertEquals(
            $events[7]['sessionTypeTitle'],
            $sessionTypes[0]['title'],
            'session type title is correct for event 7'
        );
        $this->assertEquals(count($events[7]['learningMaterials']), 0, 'Event 7 has no learning materials');
        $this->assertFalse(
            $events[7]['attireRequired'],
            'attire is correct for event 7'
        );
        $this->assertFalse(
            $events[7]['equipmentRequired'],
            'equipmentRequired is correct for event 7'
        );
        $this->assertFalse(
            $events[7]['supplemental'],
            'supplemental is correct for event 7'
        );
        $this->assertArrayNotHasKey(
            'attendanceRequired',
            $events[7],
            'attendanceRequired is correct for event 7'
        );

        $this->assertEquals($events[8]['ilmSession'], 4, 'ilmSession is correct for event 8');
        $this->assertEquals($events[8]['startDate'], $ilmSessions[3]['dueDate'], 'dueDate is correct for event 8');
        $this->assertEquals($events[8]['courseTitle'], $courses[1]['title'], 'title is correct for event 8');
        $this->assertEquals(
            $events[8]['courseExternalId'],
            $courses[1]['externalId'],
            'course external id correct for event 8'
        );
        $this->assertEquals(
            $events[8]['sessionTypeTitle'],
            $sessionTypes[0]['title'],
            'session type title is correct for event 8'
        );
        $this->assertEquals(count($events[8]['learningMaterials']), 0, 'Event 8 has no learning materials');
        $this->assertFalse(
            $events[8]['attireRequired'],
            'attire is correct for event 8'
        );
        $this->assertFalse(
            $events[8]['equipmentRequired'],
            'equipmentRequired is correct for event 8'
        );
        $this->assertFalse(
            $events[8]['supplemental'],
            'supplemental is correct for event 8'
        );
        $this->assertArrayNotHasKey(
            'attendanceRequired',
            $events[8],
            'attendanceRequired is correct for event 8'
        );

        $this->assertEquals($events[9]['startDate'], $offerings[0]['startDate'], 'startDate is correct for event 9');
        $this->assertEquals($events[9]['endDate'], $offerings[0]['endDate'], 'endDate is correct for event 9');
        $this->assertEquals(
            $events[9]['sessionTypeTitle'],
            $sessionTypes[0]['title'],
            'session type title is correct for event 9'
        );
        $this->assertEquals(
            $events[9]['courseExternalId'],
            $courses[0]['externalId'],
            'course external id correct for event 9'
        );
        $this->assertEquals(
            $events[9]['sessionDescription'],
            $sessionDescriptions[0]['description'],
            'session description is correct for event 9'
        );
        $this->assertEquals(
            count($events[9]['learningMaterials']),
            4,
            'Event 6 has the correct number of learning materials'
        );
        $this->assertFalse(
            $events[9]['attireRequired'],
            'attire is correct for event 9'
        );
        $this->assertArrayNotHasKey(
            'equipmentRequired',
            $events[9],
            'equipmentRequired is correct for event 9'
        );
        $this->assertFalse(
            $events[9]['supplemental'],
            'supplemental is correct for event 9'
        );
        $this->assertArrayNotHasKey(
            'attendanceRequired',
            $events[9],
            'attendanceRequired is correct for event 9'
        );

        /** @var OfferingInterface $offering */
        $offering = $this->fixtures->getReference('offerings8');
        $this->assertEquals(8, $events[10]['offering'], 'offering is correct for event 10');
        $this->assertEquals(
            $events[10]['startDate'],
            $offering->getStartDate()->format('c'),
            'startDate is correct for event 10'
        );
        $this->assertEquals(
            $events[10]['endDate'],
            $offering->getEndDate()->format('c'),
            'endDate is correct for event 10'
        );
        $this->assertEquals(
            $events[10]['sessionTypeTitle'],
            $sessionTypes[1]['title'],
            'session type title is correct for event 10'
        );
        $this->assertEquals(
            $events[10]['courseExternalId'],
            $courses[1]['externalId'],
            'course external id correct for event 10'
        );
        $this->assertFalse(
            $events[10]['attireRequired'],
            'attire is correct for event 10'
        );
        $this->assertFalse(
            $events[10]['equipmentRequired'],
            'equipmentRequired is correct for event 10'
        );
        $this->assertTrue(
            $events[10]['supplemental'],
            'supplemental is correct for event 10'
        );
        $this->assertArrayNotHasKey(
            'attendanceRequired',
            $events[10],
            'attendanceRequired is correct for event 10'
        );

        foreach ($events as $event) {
            $this->assertEquals($userId, $event['user']);
        }
    }

    public function testMultidayEvent()
    {
        $offerings = $this->container->get('Tests\CoreBundle\DataLoader\OfferingData')->getAll();
        $userId = 2;
        $from = new DateTime('2015-01-30 00:00:00');
        $to = new DateTime('2015-01-30 23:59:59');

        $events = $this->getEvents($userId, $from->getTimestamp(), $to->getTimestamp());
        $this->assertEquals(1, count($events), 'Expected events returned');

        $this->assertEquals($events[0]['startDate'], $offerings[5]['startDate']);
        $this->assertEquals($events[0]['endDate'], $offerings[5]['endDate']);
        $this->assertEquals($events[0]['offering'], $offerings[5]['id']);
    }

    protected function getEvents($userId, $from, $to)
    {
        $parameters = [
            'version' => 'v1',
            'id' => $userId,
            'from' => $from,
            'to' => $to,
        ];
        $url = $this->getUrl(
            'ilios_api_userevents',
            $parameters
        );
        $this->createJsonRequest(
            'GET',
            $url,
            null,
            $this->getAuthenticatedUserToken()
        );

        $response = $this->client->getResponse();

        if (Response::HTTP_NOT_FOUND === $response->getStatusCode()) {
            $this->fail("Unable to load url: {$url}");
        }

        $this->assertJsonResponse($response, Response::HTTP_OK);

        return json_decode($response->getContent(), true)['userEvents'];
    }
}