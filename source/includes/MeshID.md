# Documentation

## `public class MeshID implements Comparable<MeshID>, Serializable, Parcelable`

Created by jason on 08/08/16. Attempts to look for a previously created encrypted unique id file on the device. If it does not exist, attempt to create one.



Later on we will support restoration of an existing id using 2d bar codes

## `public boolean readIdentity(String password)`

Used to read the identity of a user from a keystore file. Not meant to be called by developers

 * **Parameters:** `password` — The password to the encrypted wallet file
 * **Returns:** success if the operation was successful, otherwise false

## `public boolean writeIdentity(String password)`

Assumes we have a valid identity, tries to save it in the proper folder. Not meant to be called by developers

 * **Parameters:** `password` — for the encrypted wallet file
 * **Returns:** true if the operation was successful, false othewise

## `public void createIdentity()`

Creates a new random identity. Not meant to be called by developers

## `private boolean readID(File keystore, String password)`

Attempts to read the file and parse it into JSON objects so that we can attempt to decrypt the private key, derive the id and public address.



Not meant to be called by developers

 * **Parameters:** `keystore` — the keystore file to be parsed
 * **Returns:** true if the operation was successful, false otherwise

## `@SuppressWarnings("unchecked") private boolean writeID(File keystore, String password)`

If we have to write the the ID file - for now we generate a new address because this function should only be called if the keystore doesn't already exist.



TODO: implement some method to ask the user for a password for encrypting the identity

 * **Parameters:** `keystore` — the keystore to write the output to
 * **Returns:** true if the operation was successful, false otherwise

## `private Object getIgnoreCase(JSONObject jobj, String key)`

Helper function which searches the JSON for the key in a case insensitive way (some of the key Store files, especially the older ones don't follow the convention properly)

 * **Parameters:**
   * `jobj` — the JSON object we are searching
   * `key` — the key (name) of the field we are searching for
 * **Returns:** returns the object that is found (could be another JSON object, a String, Int, etc.

     or null if nothing is found.

## `private boolean parseFromJSON(JSONObject keystore)`

Attempts to construct a KeyStore out of the JSON object supplied.

 * **Parameters:** `keystore` — the keystore JSON object to try to parse for all of the required

     fields. Will return false if something isn't right
 * **Returns:** true if success, false otherwise

## `private boolean unlock(String passwd)`

Attempts to unlock the keystore which has been loaded. If it is successful, the Keystore object will have its fields filled with all of the information required for enc / dec and account access (address, public & private key etc). https://github.com/ethereum/go-ethereum/wiki/Passphrase-protected-key-store-spec https://github.com/ethereum/wiki/wiki/Web3-Secret-Storage-Definition https://github.com/akoskm/bouncy-castle-sha3/blob/master/src/main/java/io/github/ bouncycastlesha3/SHA3Util.java http://javadox.com/com.lambdaworks/scrypt/1.4.0/com/lambdaworks/crypto/SCryptUtil.java.html https://www.myetherwallet.com/

 * **Returns:** true if the unlocking was successful, false otherwise

## `private byte[] concatenateByteArrays(byte[] a, byte[] b)`

Helper function to join two byte arrays together.

 * **Parameters:**
   * `a` — the first byte array
   * `b` — the second byte array
 * **Returns:** the merged array

## `public String toDebugString()`

Used to print out a textual representation of the Keystore.



Not meant to be called by developers

 * **Returns:** the string representation of the Keystore

## `public byte[] getRawUuid()`

Assumes the ID has either already been read in from a file or auto generated.

 * **Returns:** the 20 byte uuid

## `@Override public String toString()`

Returns the Hex String representation of the public uuid.

 * **Returns:** the Hex String representation of the public uuid

## `@Override public boolean equals(Object p2)`

Compares this ID with another - for now does the comparison based on the 20 byte public address which is being used as the uuid.

 * **Parameters:** `p2` — the second ID to compare against
 * **Returns:** true or false depending on if they are equal

## `@Override public int hashCode()`

Required for equality in the hashmap (immutability).

## `private int compare(byte[] left, byte[] right)`

Utility function for comparing two byte arrays

 * **Parameters:**
   * `left` — the left array to compare
   * `right` — the right array to compare
 * **Returns:** less than 0 if a less than b, greater than zero if b greater than a. zero otherwise

## `public int compareTo(@NonNull MeshID compareID)`

Allows comparison by ID so that we can sort entries by ID

 * **Parameters:** `compareID` — the MeshID to compare against
 * **Returns:** less than 0 if a < b, greater than zero if b < a. zero otherwise

## `public void readObject(ObjectInputStream aInputStream) throws ClassNotFoundException, IOException`

Assumes we are reading a mesh id to be creatd from raw bytes note the mesh id created from this read cannot generate a compatible eckey for signatures. Note we only reconstructing the uuid itself not any of the encryption stuff or the wallet info.

 * **Parameters:** `aInputStream` — the object stream to read the MeshID object from.
 * **Exceptions:**
   * `ClassNotFoundException` — if the object type or version doesn't match MeshID
   * `IOException` — if there was a general error reading from the stream (ended early

     or something)

## `public void writeObject(ObjectOutputStream aOutputStream) throws IOException`

Writes out a MeshID with raw bytes. Note the mesh id created from this write cannot generate a compatible eckey for signatures. We only serialize the raw uuid bytes and none of the encryption stuff.

 * **Parameters:** `aOutputStream` — the object stream we will write the uuid into.
 * **Exceptions:** `IOException` — if there was an error writing to the output stream.

## `public int getRegistrationID()`

Used for encryption - this is the signal store registration ID of the remote address. (Developers should not have access to this)

 * **Returns:** the signal store registration ID of the remote device

## `public IdentityKey getIDPublicKey()`

Accessor for the identity public key. (Developers should not have access to this)

 * **Returns:** the signal public key associated with this identity

## `public ECPublicKey getSignedPreKeyPublicKey()`

Accessor for the signed pre key public key (probably we should actually return a whole set of these since they should be generated in groups and then exchanged all at once). (Developers should not have access to this)

 * **Returns:** the signed pre key public key

## `public ECPublicKey getPreKeyPublicKey()`

Accessor for the pre key public key (probably we should actually return a whole set of these since they should be generated in groups and then exchanged all at once). (Developers should not have access to this)

 * **Returns:** the pre key public key

## `public byte[] getPreKeySignature()`

Computes and returns the prekey signature or throws exception. (Developers should not have access to this)

 * **Returns:** the valid prekey signature or throws exception

## `public void addRemoteKeyBundle(PreKeyBundle remoteKeyBundle, MeshID puuid) throws InvalidKeyException, UntrustedIdentityException`

Attempts to add the prekeybundle to our local signal store. (Developers should not have access to this)

 * **Parameters:**
   * `remoteKeyBundle` — the prekey bundle we wish to add
   * `puuid` — the MeshID of the peer we wish to add a key to the keystore for
 * **Exceptions:**
   * `InvalidKeyException` — if the key we are trying to add isn't good
   * `UntrustedIdentityException` — if the key hasn't been signed properly.

## `public SessionCipher getPeerSession(MeshID puuid)`

Creates a new peer session if we haven't set one up with the remote peer yet, or returns the already existing session cipher so we can encrypt / decrypt with it. (Developers should not have access to this)

 * **Parameters:** `puuid` — the peer MeshID we are trying to return a session with
 * **Returns:** the session cipher of a previous or new session with a remote peer

## `public boolean hasSession(MeshID puuid)`

Given a peer MeshID, returns whether or not an encryption session exists. If a developer calls this function, they can only call it on their own MeshID, and then pass in the MeshID of the peers we wish to know about sessions. If the session doesn't exists, they should initiate the exchangeKeys function.

 * **Parameters:** `puuid` — the peer MeshID
 * **Returns:** true if an encryption sessions exists with this peer, false otherwise

## `public int getPrekeyid()`

Used for the signal encryption exchange (Not to be used by developers)

 * **Returns:** the id in the keystore for the prekey we have stored of ourselves.

## `public int getSignedprekeyid()`

Used for the signal encryption exchange (Not to be used by developers)

 * **Returns:** the id in the keystore for the signedprekey we have stored of ourselves.
