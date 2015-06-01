<?php namespace App\Http\Controllers;

require 'Pintlabs_Service_Untappd_Exception.php';
/**
 * Provides a service into the Untappd public API.
 *
 * @see    http://untappd.com/api/dashboard
 * @author PintLabs - http://www.pintlabs.com
 *
 */
class Pintlabs_Service_Untappd
{
    /**
     * Base URI for the Untappd service
     *
     * @var string
     */
    const URI_BASE = 'https://api.untappd.com/v4';
    /**
     * Client ID
     *
     * @var string
     */
    protected $_clientId = '';
    /**
     * Client Secret
     *
     * @var string
     */
    protected $_clientSecret = '';
    /**
     * Access token
     *
     * @var string
     */
    protected $_accessToken = '';
    /**
     * URI to redirect a user back to
     *
     * @var string
     */
    protected $_redirectUri = '';
    /**
     * Stores the last parsed response from the server
     *
     * @var stdClass
     */
    protected $_lastParsedResponse = null;
    /**
     * Stores the last raw response from the server
     *
     * @var string
     */
    protected $_lastRawResponse = null;
    /**
     * Stores the last requested URI
     *
     * @var string
     */
    protected $_lastRequestUri = null;
    /**
     * Constructor
     *
     * @throws Pintlabs_Service_Untappd_Exception
     *
     * @param array $connectArgs Connection arguments for OAuth. Options are
     *        - clientId:  Client ID for your app
     *        - clientSecret:  Client secret for your app
     *        - accessToken:  Access token for the user
     *        - redirectUri:  Redirect URI for untappd to return the user to
     */
    public function __construct(array $connectArgs = array())
    {
        $this->_clientId = getenv('UNTAPPD_CLIENT_ID');
        $this->_clientSecret = getenv('UNTAPPD_CLIENT_SECRET');
        $this->_accessToken = (isset($connectArgs['accessToken'])) ? $connectArgs['accessToken'] : '';
        $this->_redirectUri = getenv('UNTAPPD_REDIRECT_URL');
    }

    private function getData($type){
        return json_decode(file_get_contents("Data/$type.json"));
    }
    /**
     * Convenience method to generate URI to redirect users to for OAuth2
     *
     * @return string URI
     */
    public function authenticateUri()
    {
        return getenv('UNTAPPD_REDIRECT_URL');
    }
    /**
     * Exchanges a code, which is passed back from untappd, for an access token.
     *
     * @param string $code
     * @return string access token
     */
    public function getAccessToken($code)
    {
        return "1234567890";
    }
    /**
     * Returns the authenticated user's friend feed
     *
     * @param int *optional* $offset offset within the dataset to move to
     * @param int *optional* $limit The number of results to return, max of 50, default is 25
     */
    public function myFriendFeed($offset = '', $limit = '')
    {
        // TODO
        return null;
    }
    /**
     * Adds a beer to the logged-in-user's wishlist
     *
     * @param int $beerId Untappd beer ID to add
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function addToMyWishlist($beerId)
    {
        // TODO
        return null;
            
    }
    /**
     * Removes a beer from the logged-in-user's wishlist
     *
     * @param int $beerId Untappd beer ID to remove
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function removeFromMyWishlist($beerId)
    {
        // TODO
        return null;
    }
    /**
     * Lists any pending requests to become friends
     *
     */
    public function myPendingFriends()
    {
        // TODO
        return null;
    }
    /**
     * Accepts a friend request from the user for the logged-in-user
     *
     * @param string $requestingUserId Untappd user ID
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function acceptMyFriendRequest($requestingUserId)
    {
        // TODO
        return null;
    }
    /**
     * Rejects a friend request from the user for the logged-in-user
     *
     * @param string $requestingUserId Untappd user ID
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function rejectMyFriendRequest($requestingUserId)
    {
        // TODO
        return null;
    }
    /**
     * Un-friends a user from the logged-in-user
     *
     * @param string $friendUserId Untappd user ID
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function removeMyFriend($friendUserId)
    {
        // TODO
        return null;
    }
    /**
     * Makes a friend requets from the logged-in-user to the user passed
     *
     * @param string $userId Untappd user ID
     */
    public function makeMyFriendRequest($userId)
    {
        // TODO
        return null;
    }
    /**
     * Gets a user's info
     *
     * @param string *optional* $username Untappd username
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function userInfo($username = '')
    {
        return $this->getData('user_info');
    }
    /**
     * Gets a user's checkins
     *
     * @param string *optional* $username Untappd username
     * @param int *optional* $limit The number of results to return, max of 50, default is 25
     * @param int *optional* $offset offset within the dataset to move to
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function userFeed($username = '', $limit = '', $offset = '')
    {
        return $this->getData('user_feed');
    }
    /**
     * Gets a user's distinct beer list
     *
     * @param string *optional* $username Untappd username
     * @param int *optional* $offset offset within the dataset to move to
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function userDistinctBeers($username = '', $offset = '', $sort = '')
    {
        return $this->getData('user_distinct_beers');
    }
    /**
     * Gets a list of a user's friends
     *
     * @param string *optional* $username Untappd username
     * @param int *optional* $offset offset within the dataset to move to
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function userFriends($username = '', $offset = '', $limit = '')
    {
        return null;
    }
    /**
     * Gets a user's wish list
     *
     * @param string *optional* $username Untappd username
     * @param int *optional* $offset offset within the dataset to move to
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function userWishlist($username = '', $offset = '')
    {
        return null;
    }
    /**
     * Gets a list of a user's badges they have won
     *
     * @param string *optional* $username Untappd username
     * @param string *optional* $offset The numeric offset that you what results to start
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function userBadge($username = '', $offset = '')
    {
        return null;
    }
    /**
     * Gets a beer's critical info
     *
     * @param int $beerId Untappd beer ID
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function beerInfo($beerId)
    {
        return null;
    }
    /**
     * Searches Untappd's database to find beers matching the query string
     *
     * @param string $searchString query string to search
     * @param (name|count|*empty*) *optional* flag to sort the results
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function beerSearch($searchString, $sort = '')
    {
        return $this->getData('beer_search');
    }
    /**
     * Gets all checkins for a specified beer
     *
     * @param int $beerId Untappd ID of the beer to search for
     * @param int *optional* $since numeric ID of the latest checkin
     * @param int *optional* $offset offset within the dataset to move to
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function beerFeed($beerId, $since = '', $offset = '')
    {
        return null;
    }
    /**
     * Gets information about a given venue
     *
     * @param int $venueId Untappd ID of the venue
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function venueInfo($venueId)
    {
        return null;
    }
    /**
     * Gets all checkins at a given venue
     *
     * @param int $venueId Untappd ID of the venue
     * @param int *optional* $since numeric ID of the latest checkin
     * @param int *optional* $offset offset within the dataset to move to
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function venueFeed($venueId, $since = '', $offset = '', $limit = '')
    {
        return null;
    }
    /**
     * Gets all for beers of a certain brewery
     *
     * @param int $breweryId Untappd ID of the brewery
     * @param int *optional* $maxId The checkin ID that you want the results to start with
     * @param int *optional* $minId The numeric ID of the most recent check-in. New results will only be shown if there are checkins before this ID
     * @param int *optional* $limit The number of results to return, max of 50, default is 25
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function breweryFeed($breweryId, $maxId = '', $minId = '', $limit = '')
    {
        return null;
    }
    /**
     * Gets the basic info for a brewery
     *
     * @param int $breweryId Untappd brewery ID
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function breweryInfo($breweryId)
    {
        return null;
    }
    /**
     * Searches for all the breweries based on a query string
     *
     * @param string $searchString search term to search breweries
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function brewerySearch($searchString)
    {
        return null;
    }
    /**
     * Searches for an Untappd venue ID based on a FourSquare venue ID.
     *
     * @param string $searchString FourSquare venue id
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function foursquareVenueLookup($venueID)
    {
        return null;
    }
    /**
     * Gets the public feed of checkings, also known as "the pub"
     *
     *@ param int *optional* $since numeric ID of the latest checkin
     * @param int *optional* $offset offset within the dataset to move to
     * @param float *optional* $longitude longitude to filter public feed
     * @param float *optional* $latitude latitude to filter public feed
     * @param int *optional* $radius radius from the lat and long to filter feed
     * @param int *optional* $limit  The number of results to return, max of 50, default is 25
     */
    public function publicFeed($since = '', $offset = '', $longitude = '', $latitude = '', $radius = '', $limit = '')
    {
        return null;
    }
    /**
     *
     * Gets the trending list of beers based on location
     *
     * @param (all|macro|micro|local) *optional* $type Type of beers to search for
     * @param float *optional* $latitude Numeric latitude to filter the feed
     * @param float *optional* $longitude Numeric longitude to filter the feed
     * @param int *optional* $radius Radius in miles from the long/lat points
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function publicTrending($type = 'all', $latitude = '', $longitude = '', $radius = '')
    {
        return null;
    }
    /**
     * Gets the details of a specific checkin
     *
     * @param int $checkinId Untappd checkin ID
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function checkinInfo($checkinId)
    {
        return null;
    }
    /**
     * Perform a live checkin
     *
     * @param int $gmtOffset - Hours the user is away from GMT
     * @param int $beerId - Untappd beer ID
     * @param string *optional* $foursquareId - MD5 hash ID of the venue to check into
     * @param float *optional* $userLat - Latitude of the user.  Required if you add a location.
     * @param float *optional* $userLong - Longitude of the user.  Required if you add a location.
     * @param string *optional* $shout - Text to include as a comment
     * @param boolean *optional* $facebook - Whether or not to post to facebook
     * @param boolean *optional* $twitter - Whether or not to post to twitter
     * @param boolean *optional* $foursquare - Whether or not to checkin on foursquare
     * @param int *optional* $rating - Rating for the beer
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function checkin($gmtOffset, $timezone, $beerId, $foursquareId = '', $userLat = '', $userLong = '', $shout = '', $facebook = false, $twitter = false, $foursquare = false, $rating = '')
    {
        return null;
    }
    /**
     * Adds a comment to a specific checkin
     *
     * @param int $checkinId - Checkin to comment on
     * @param string $comment - Comment to add to the checkin
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function checkinComment($checkinId, $comment)
    {
        return null;
    }
    /**
     * Remove a comment from a checkin
     *
     * @param int $commentId
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function checkinRemoveComment($commentId)
    {
        return null;
    }
    /**
     * Toast a checkin
     *
     * @param int $checkinId
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function checkinToast($checkinId)
    {
        return null;
    }
    /**
     * Remove a toast from a checkin
     *
     * @param int $checkinId
     *
     * @throws Pintlabs_Service_Untappd_Exception
     */
    public function checkinRemoveToast($checkinId)
    {
        return null;
    }
    /**
     * Sends a request using curl to the required URI
     *
     * @param string $method Untappd method to call
     * @param array $args key value array or arguments
     *
     * @throws Pintlabs_Service_Untappd_Exception
     *
     * @return stdClass object
     */
    protected function _request($method, $args, $requireAuth = false)
    {
        return null;
    }
    /**
     * Gets the last parsed response from the service
     *
     * @return null|stdClass object
     */
    public function getLastParsedResponse()
    {
        return $this->_lastParsedResponse;
    }
    /**
     * Gets the last raw response from the service
     *
     * @return null|json string
     */
    public function getLastRawResponse()
    {
        return $this->_lastRawResponse;
    }
    /**
     * Gets the last request URI sent to the service
     *
     * @return null|string
     */
    public function getLastRequestUri()
    {
        return $this->_lastRequestUri;
    }
}

