#processing the uploaded csv file
import pandas as pd 


#read the uploaded csv 
df = pd.read_csv("$fileDestination")  ###

print(df.head())



#create dictionary to categroze keywords from the description column
category_map = {
    "Transport": ["uber", "taxi"],
    "Shopping": ["amazon", "newlook"]
}



#create function to assign the categories, pass in description cos this is what we use to define
def categorize(description):
    description = str(description).lower()
        #key       #value       #creates a tuple with both key and value
    for category, keywords in category_map.items():
        #loops thru all they keywords
        for keyword in keywords:
            #if one of them is also inside the description
            if keyword in description:
                return category
    return "Other"



# creating a new column for the assigned category
# original csv is not affected cos we read the csv into memory

df["Category"] = df["Description"].apply(categorize)
print(df.head())
   

