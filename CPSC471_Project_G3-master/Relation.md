### GOODS

<ins>ID</ins>

name
visit 
introduction 
item\_condition 
price 
client\_ID\_of\_seller (foreign key)
year\_of\_expired\_date
month\_of\_expired\_date
day\_of\_expired\_date
picture
rank_ID
type\_ID (foreign key)
admin\_ID (foreign key)

### COMMENTS

<ins>comment_ID</ins>

content
year\_of\_post\_date
month\_of\_post\_date
day\_of\_post\_date
goods\_ID (foreign key)
client\_ID (foreign key)

### CLIENT

<ins>client_ID</ins>

password
campus\_email\_address
user\_name
password\_question
password\_answer
year\_of\_date\_of\_birth
month\_of\_date\_of\_birth
day\_of\_date\_of\_birth
account\_status
phone\_number
year\_of\_date\_of\_registration
month\_of\_date\_of\_registration
day\_of\_date\_of\_registration
UCID (foreign key)

### UC_MEMBER

<ins>UCID</ins>

campus\_email\_address

### ANNOUNCEMENTS

<ins>announcement_ID</ins>
????
password
email\_address
admin\_username
password\_answer
year\_of\_date\_of\_birth
month\_of\_date\_of\_birth
day\_of\_date\_of\_birth
phone\_number
year\_of\_date\_registration
month\_of\_date\_registration
day\_of\_date\_registration
content

### ADMIN

<ins>admin_ID</ins>

password
email\_address
admin\_address
admin\_username
password\_answer
year\_of\_date\_of\_birth
month\_of\_date\_of\_birth
day\_of\_date\_of\_birth
phone\_number
year\_of\_date\_of\_registration
month\_of\_date\_of\_registration
day\_of\_date\_of\_registration

### TYPE\_OF\_GOODS

<ins>type_ID</ins>

type\_name

### ORDER

<ins>order_ID</ins>

total\_price
delivery\_address
delivery\_method
year\_of\_date\_of\_order\_creation
month\_of\_date\_of\_order\_creation
day\_of\_date\_of\_order\_creation
status
first\_name\_of\_receiver
middle\_name\_of\_receiver
last\_name\_of\_receiver
client\_ID\_of\_seller  (foreign key)
client\_ID\_of\_buyer  (foreign key)
goods\_ID (foreign key)

### PURCHASES

<ins>client\_ID\_of\_buyer</ins>

<ins>goods\_ID</ins>

### EDITS

<ins>type\_ID</ins>  (foreign key)

<ins>admin\_ID</ins> (foreign key)

### MANAGES

<ins>comment\_ID</ins>
<ins>client\_ID</ins>
<ins>order\_ID</ins>
<ins>announcement\_ID</ins>
<ins>UC\_MEMBER\_UCID</ins>
<ins>admin\_ID</ins>
period\_of\_account\_ban

### SELLER

<ins>client\_ID<ins> (foreign key)

### BUYER

<ins>client\_ID<ins> (foreign key)
