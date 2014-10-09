import soundcloud
import logging
logging.basicConfig(filename='messages.log',level=logging.DEBUG)


#Read in Username/Pass
infile = open('/var/www/html/credentials.txt', "r")
clientUsername = infile.readline()[:-1]
clientPass = infile.readline()[:-1]
infile.close()

#Setup soundcloud client
client =  soundcloud.Client(
        client_id = 'fc2d2bb48658c6612489eed9aaa88dc4',
        client_secret = '4804399b93b3639e1a3ddb51582802b6',
        username = clientUsername,
        password = clientPass
)


#Read in tracks To Post
toPost = list()
toPostFile = open('/var/www/html/topost.txt',"r")
for line in toPostFile:
	toPost.append(line[:-1])
toPostFile.close()

#Read in Already Posted Tracks
alreadyPosted = list()
postedTracks = open('postedtracks.txt',"r")
for line in postedTracks:
	alreadyPosted.append(line[:-1])
postedTracks.close()
#Post new Track
differenceList = [x for x in toPost if x not in alreadyPosted]
if len(differenceList) != 0:
	trackURL = differenceList[0]
	postedTracks = open("postedtracks.txt","a")
	postedTracks.write(trackURL+'\n')
	postedTracks.close()
	trackToPost = client.get('/resolve', url=trackURL).id
	#print("Posted " + str(trackToPost))
	logging.info("Posted or attempted to post "+ str(trackToPost))
	client.put('/e1/me/track_reposts/%d' % trackToPost)
