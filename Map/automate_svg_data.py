import mysql.connector
from bs4 import BeautifulSoup

# Define island IDs
ISLAND_IDS = {'Luzon': 1, 'Visayas': 2, 'Mindanao': 3}

# Connect to MySQL database
db = mysql.connector.connect(
    host="localhost",
    user="EnaKashi",
    password="Lyric",
    database="mapaturo"
)
cursor = db.cursor()

# Parse SVG file and extract data
province_id = 1
with open('svg-map.php', 'r') as file:
    content = file.read()
    soup = BeautifulSoup(content, 'html.parser')

    # Iterate over islands in the specified order
    for island_name, island_id in ISLAND_IDS.items():
        # Insert data into islands table
        cursor.execute("INSERT INTO islands (id, name) VALUES (%s, %s)", (island_id, island_name))

        # Find region data for the current island
        island = soup.find('g', id=island_name)
        if island:
            for region in island.find_all('g'):
                region_name = region['id']

                # Define custom region id using input
                region_id = input("Enter region ID for {}:".format(region_name))
                
                cursor.execute("INSERT INTO regions (id, name, island_id) VALUES (%s, %s, %s)", (region_id, region_name, island_id))
                for province in region.find_all('path'):
                    province_name = province.find('title').text
                    path_data = province['d']
                    cursor.execute("INSERT INTO provinces (id, name, region_id) VALUES (%s, %s, %s)", (province_id, province_name, region_id))
                    cursor.execute("INSERT INTO path_data (id, province_id, path_info) VALUES (%s, %s, %s)", (province_id, province_id, path_data))
                    province_id += 1
        else:
            print(f"No data found for {island_name}")

# Commit changes and close connection
db.commit()
cursor.close()
db.close()
