<?php 
// TODO: add copyright to all files
// A FacebookResponse is returned from an executed FacebookRequest
try {
  $response = (new FacebookRequest($session, 'GET', '/me'))->execute();
  // You can get the request back:
  $request = $response->getRequest();
  // You can get the response as a GraphObject:
  $object = $response->getGraphObject();
  // You can get the response as a subclass of GraphObject:
  $me = $response->getGraphObject(GraphUser::className());
  // If this response has multiple pages, you can get a request for the next or previous pages:
  $nextPageRequest = $response->getRequestForNextPage();
  $previousPageRequest = $response->getRequestForPreviousPage();
} catch (FacebookRequestException $ex) {
  echo $ex->getMessage();
} catch (\Exception $ex) {
  echo $ex->getMessage();
}

// You can also chain the methods together: 
$me = (new FacebookRequest(
  $session, 'GET', '/me'
))->execute()->getGraphObject(GraphUser::className);
echo $me->getName();

?>